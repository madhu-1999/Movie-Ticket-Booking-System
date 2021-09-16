<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
	<body style="background-color:#f2f2f2">
		<h2 style="margin-left:550px;">About Us</h2>
		<xsl:apply-templates/>
	</body>
</html>
</xsl:template>

<xsl:template match="aboutus">
	<h3 style="margin-left:500px">Mission &amp; Vision</h3>
	<div style="background-color:#fff;margin:30px;">
		<xsl:apply-templates select="mission"/></div>
		<div style="background-color:#fff;margin:30px;">
		<xsl:apply-templates select="p1"/>
		<xsl:apply-templates select="p2"/>
		<xsl:apply-templates select="p3"/>
		<xsl:apply-templates select="p4"/>
	</div>
</xsl:template>

<xsl:template match="mission">
	<p style="font-size:20px;text-indent:20%"><i>&quot;<xsl:value-of select="."/>&quot;</i></p>
</xsl:template>

<xsl:template match="p1|p2|p3|p4">
	<p style="font-size:18px;text-indent:10%;"><xsl:value-of select="."/></p>
</xsl:template>

</xsl:stylesheet>