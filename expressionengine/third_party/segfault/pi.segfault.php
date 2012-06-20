<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
						'pi_name'			=> 'Segfault',
						'pi_version'		=> '1.0',
						'pi_author'			=> 'Mark Spurlock',
						'pi_author_url'		=> 'https://github.com/Spurlock',
						'pi_description'	=> 'Provide default fallback values for URL segment variables',
						'pi_usage'			=> Segfault::usage()
					);

/**
 * Segfault Class
 */

class Segfault {

	var $return_data;
	
	/**
	 * Constructor
	 */
	function Segfault()
	{
		$this->EE =& get_instance();
		
		$def = $this->EE->TMPL->fetch_param('default');
		
		$seg = $this->EE->TMPL->fetch_param('seg');
		$seg = $this->EE->uri->segment($seg, $def); //the second parameter is a fallback value.		
		
		$this->return_data = $seg;
	}	
		
	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	function usage()
	{
		ob_start(); 
		?>
		
		The following code will does exactly what {segment_1} does, except that if {segment_1} is empty is outputs "photos" instead.
		 
		{exp:segfault seg="1" default="photos"}
		
		I think that pretty much covers it.

		<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
	}

}