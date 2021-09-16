<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
    <head>
       <link rel="stylesheet" type="text/css" href="../css/header-footer.css"></link>
        <script src="https://kit.fontawesome.com/8f6d4e20a8.js" crossorigin="anonymous"></script>
       <script>
  function goBack() {
   window.history.back()
}
</script>
     </head>
  <body>
    <header>
    <nav class="topnav">
      <div class="logo">
        <h2>CiNExt</h2>
        <form method="get" action="../php/search.php">
          <input type="text" name="search" placeholder="Search for movies,cinema..." size="35" list="movies"/>
          <datalist id="movies">
            <option>Tanhaji:the Unsung Hero</option>
            <option>Chhapak</option>
            <option>Good Newz</option>
          </datalist>
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        <br/><br/><br/>
      </div>
      <a href="../php/home.php">Home</a>
      <a href="../php/aboutus.php">About Us</a>
      <div class="dropdown">
      <a href="cinema.html">Cinemas</a>
      <div class="dropdown-content">
        <a href="cinema.html#seasonsmall">CiNExt Seasons Mall,Hadapsar</a>
        <a href="cinema.html#bundgarden">CiNext Bund Garden</a>
        <a href="cinema.html#pacificmall">CiNext Pacific Mall</a>
        <a href="cinema.html#pavillionmall">CiNext Pavillion Mall</a>
      </div>
    </div>
      <a href="home.php">Movies</a> 
    </nav>
  </header>
  
  <table border="1">
    <tr bgcolor="#0088ff">
      <th>Title</th>
      <th>Description</th>
    </tr>
    <xsl:for-each select="catalog/cd">
    <tr>
      <td><xsl:value-of select="title"/></td>
      <td><xsl:value-of select="artist"/></td>
    </tr>
	
    </xsl:for-each>
  </table>

  <footer class="footer">
    <table>
      <tr>
        <th><a href="../php/home.php">Home</a></th>
        <th><a href="../php/home.php">Movies</a></th>
        <th colspan="2">Get In Touch</th>
        <th colspan="3">Help &amp; Support</th>
      </tr>
      <tr>
        <th><a href="cinema.html">Cinemas</a></th>
        <th><a href="../php/aboutus.php">About Us</a></th>
        <td><a href="mailto:cinext@gmail.com">Contact Us</a></td>
        <td><a href="feedback.html">Feedback</a></td>
        <td><a href="../php/sitemap.php">SiteMap</a></td>
        <td><a href="../php/support.php">FAQs</a></td>
        <td><a href="tnc.xml">Terms and Conditions</a></td>
      </tr>
    </table>
    <center><small>Copyright 2020 &amp;copy XYZ Corporation.All Rights Reserved</small></center>
  </footer>

</body>
</html>
 
</xsl:template>

</xsl:stylesheet> 
