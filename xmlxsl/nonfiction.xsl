<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version = "1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">

   <xsl:output method = "html" omit-xml-declaration = "no" 
      doctype-system = 
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" 
      doctype-public = "-//W3C//DTD XHTML 1.0 Strict//EN" />

   <xsl:template match = "/">
      
	  <html xmlns = "http://www.w3.org/1999/xhtml">	
	  
	  <link rel="stylesheet" type="text/css" href="style.css" />
         
        <body>
           
			<xsl:for-each select="category/book[@catalog='nonfiction']">
			
			<div id="new_prod" >
		
				<div class="new_prod_box" id="new_prod_box">
                    <xsl:element name = "a">
						<xsl:attribute name = "href">
							<xsl:value-of select="url"/>
						</xsl:attribute>
						<xsl:value-of select="title"/>
					</xsl:element>
					
                    <div class="new_prod_bg" id="new_prod_bg">
                        <xsl:element name = "a">
							<xsl:attribute name = "href">
								<xsl:value-of select =  "url"/>
							</xsl:attribute>
							<xsl:element name = "img">
								<xsl:attribute name = "src">
									<xsl:value-of select="image"/>
								</xsl:attribute>
							</xsl:element>
						</xsl:element>
                    </div>  
					
				</div>
				
			</div> 	
		
			</xsl:for-each>
			       
		</body>
      
	  </html>
   
	</xsl:template>
	
</xsl:stylesheet>

<!--
**************************************************************************
* (C) Copyright 1992-2008 by Deitel & Associates, Inc. and               *
* Pearson Education, Inc. All Rights Reserved.                           *
*                                                                        *
* DISCLAIMER: The authors and publisher of this book have used their     *
* best efforts in preparing the book. These efforts include the          *
* development, research, and testing of the theories and programs        *
* to determine their effectiveness. The authors and publisher make       *
* no warranty of any kind, expressed or implied, with regard to these    *
* programs or to the documentation contained in these books. The authors *
* and publisher shall not be liable in any event for incidental or       *
* consequential damages in connection with, or arising out of, the       *
* furnishing, performance, or use of these programs.                     *
**************************************************************************
-->