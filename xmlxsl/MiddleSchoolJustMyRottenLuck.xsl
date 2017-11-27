<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version = "1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">

  <xsl:output method = "html" omit-xml-declaration = "no"
     doctype-system = 
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"
     doctype-public = "-//W3C//DTD XHTML 1.0 Strict//EN" />
	 

  <xsl:template match = "/">

    <html xmlns = "http://www.w3.org/1999/xhtml">

      <body>

        <xsl:for-each select="category/book[@name='MiddleSchoolJustMyRottenLuck']">

          <div class="left_content">
            <div class="crumb_nav">
              <a href="index.html">home</a> &gt;&gt; <xsl:value-of select = "title"/>
            </div>
            <div class="title">
              <span class="title_icon">
                <img src="images/bullet1.gif" alt="" title="" />
              </span><xsl:value-of select = "title"/>
            </div>

            <div class="feat_prod_box_details">

              <div class="prod_img">
                <xsl:element name = "img">
								<xsl:attribute name = "src">
									<xsl:value-of select="image2"/>
								</xsl:attribute>
							</xsl:element>
                <br />
                <br />
                <a href="images/big_pic.jpg" rel="lightbox">
                  <img src="images/zoom.gif" alt="" title="" border="0" />
                </a>
              </div>

              <div class="prod_det_box">
                <div class="box_top"></div>
                <div class="box_center">
                  <div class="prod_title">Details</div>
                  <p class="details">
					ARTIST: <xsl:value-of select = "artist/firstname"/>
							<xsl:value-of select = "artist/familyname"/>
					<br />
                    CATEGORY: <xsl:value-of select = "catalog"/>
					<br />
                    LANGUAGE: <xsl:value-of select = "language"/>
					<br />
					ISBN: <xsl:value-of select = "isbn"/>
					<br />
					ISBN-10:<xsl:value-of select = "isbn-10"/>
					<br />
					<br />
					<br />
                  </p>
				  <div class="price">
                    <strong>Was PRICE:</strong>
                    <span class="red"><xsl:value-of select = "was"/></span>
                  </div>
                  <div class="price">
                    <strong>PRICE:</strong>
                    <span class="red"><xsl:value-of select = "price"/></span>
                  </div>
                  <div class="price">
                    <strong>COLORS:</strong>
                    <span class="colors">
                      <img src="images/color1.gif" alt="" title="" border="0" />
                    </span>
                    <span class="colors">
                      <img src="images/color2.gif" alt="" title="" border="0" />
                    </span>
                    <span class="colors">
                      <img src="images/color3.gif" alt="" title="" border="0" />
                    </span>
                  </div>
                  <a href="#" class="more" onclick="window.open('order.html?transdata='+'MiddleSchoolJustMyRottenLuck')">
                    <img src="images/order_now.gif" alt="" title="" border="0" />
                  </a>
                  <div class="clear"></div>
                </div>

                <div class="box_bottom"></div>
              </div>
              <div class="clear"></div>
            </div>


            <div id="demo" class="demolayout">

              <ul id="demo-nav" class="demolayout">
                <li>
                  <a class="active" href="#tab1">More details</a>
                </li>
                <li>
                  <a class="" href="#tab2">Related books</a>
                </li>
              </ul>

              <div class="tabs-container">

                <div style="display: block;" class="tab" id="tab1">
				<div class="prod_title">Description</div>
                  <p class="more_details">
                    <xsl:value-of select = "description"/>
                  </p>
                  <ul class="list">
                    <li>
                      <a href="#">a</a>
                    </li>
                    <li>
                      <a href="#">b</a>
                    </li>
                    <li>
                      <a href="#">c</a>
                    </li>
                    <li>
                      <a href="#">d</a>
                    </li>
                  </ul>
                </div>

                <div style="display: none;" class="tab" id="tab2">
                  <div class="new_prod_box">
                    <a href="details.html">product name</a>
                    <div class="new_prod_bg">
                      <a href="details.html">
                        <img src="images/thumb1.gif" alt="" title="" class="thumb" border="0" />
                      </a>
                    </div>
                  </div>

                  <div class="new_prod_box">
                    <a href="details.html">product name</a>
                    <div class="new_prod_bg">
                      <a href="details.html">
                        <img src="images/thumb2.gif" alt="" title="" class="thumb" border="0" />
                      </a>
                    </div>
                  </div>

                  <div class="new_prod_box">
                    <a href="details.html">product name</a>
                    <div class="new_prod_bg">
                      <a href="details.html">
                        <img src="images/thumb3.gif" alt="" title="" class="thumb" border="0" />
                      </a>
                    </div>
                  </div>

                  <div class="new_prod_box">
                    <a href="details.html">product name</a>
                    <div class="new_prod_bg">
                      <a href="details.html">
                        <img src="images/thumb1.gif" alt="" title="" class="thumb" border="0" />
                      </a>
                    </div>
                  </div>

                  <div class="new_prod_box">
                    <a href="details.html">product name</a>
                    <div class="new_prod_bg">
                      <a href="details.html">
                        <img src="images/thumb2.gif" alt="" title="" class="thumb" border="0" />
                      </a>
                    </div>
                  </div>

                  <div class="new_prod_box">
                    <a href="details.html">product name</a>
                    <div class="new_prod_bg">
                      <a href="details.html">
                        <img src="images/thumb3.gif" alt="" title="" class="thumb" border="0" />
                      </a>
                    </div>
                  </div>



                  <div class="clear"></div>
                </div>

              </div>


            </div>



            <div class="clear"></div>
          </div>
          <!--end of left content-->
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