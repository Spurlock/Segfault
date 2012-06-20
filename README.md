Segfault
===============

ExpressionEngine 2 plugin to provide default fallback values for URL segment variables.

The following code will does exactly what {segment_1} does, except that if {segment_1} is empty is outputs "photos" instead.
		 
{exp:segfault seg="1" default="photos"}
		
I think that pretty much covers it.