<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
                xmlns:html="http://www.w3.org/TR/REC-html40"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes" />
	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<title>Elgg Auto Sitemap</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<meta name="robots" content="noindex,follow" />
				<style type="text/css">
					body {
						font-family:Arial;
						font-size:12px;						
					}
					
					#intro {
						background: #87AAAE;
						width: 95%;
						margin:0 auto;
						padding:5px;
						text-align:center;
						font-size:110%;
						border: 1px solid #87AAAE;
					}
					
					#content{
						background-color: #F5FAFA;
						width: 95%;
						margin:0 auto;
						padding:5px;
						border-left: 1px solid #87AAAE;
						border-right: 1px solid #87AAAE;
					}

					#footer {
						background-color: #87AAAE;
						width: 95%;
						margin:0 auto;
						padding:5px;
						text-align: right;
						border: 1px solid #87AAAE;
					}
														
					table{
						margin: 0 auto;
						font-size:110%;
						color: #222;
					}
					
					table a{
						color: #222;
						text-decoration:none;
					}

					th{
						background-color: #87AAAE;
					}
					
					tr{
						background-color: #F5FAFA;
					}
					
					tr.high {
						background-color: #C1DAD6;
					}
					

				</style>
			</head>
			<body>

				<div id="intro">
					<p>
						This is a XML Sitemap which is supposed to be processed by search engines like <a href="http://www.google.com">Google</a>, <a href="http://search.msn.com">MSN Search</a> and <a href="http://www.yahoo.com">YAHOO</a>.                        
					</p>
				</div>

				<xsl:apply-templates></xsl:apply-templates>
				<div id="footer">
					This sitemap was generated by auto_sitemap plugin for <a href="http://www.elgg.org">Elgg</a>  ( by <a href="http://community.elgg.org/plugins/developer/the_yke"> the_yke </a> )				
				</div>
			</body>
		</html>
	</xsl:template>
	
	
	<xsl:template match="sitemap:urlset">
		<div id="content">
			<table cellpadding="5">
				<tr style="border-bottom:1px black solid;">
					<th>URL</th>
					<th>Priority</th>
					<th>Change frequency</th>
					<th>Last modified (GMT)</th>
				</tr>
				<xsl:variable name="lower" select="'abcdefghijklmnopqrstuvwxyz'"/>
				<xsl:variable name="upper" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'"/>
				<xsl:for-each select="./sitemap:url">
					<tr>
						<xsl:if test="position() mod 2 != 1">
							<xsl:attribute  name="class">high</xsl:attribute>
						</xsl:if>
						<td>
							<xsl:variable name="itemURL">
								<xsl:value-of select="sitemap:loc"/>
							</xsl:variable>
							<a href="{$itemURL}">
								<xsl:value-of select="sitemap:loc"/>
							</a>
						</td>
						<td>
							<xsl:value-of select="concat(sitemap:priority*100,'%')"/>
						</td>
						<td>
							<xsl:value-of select="concat(translate(substring(sitemap:changefreq, 1, 1),concat($lower, $upper),concat($upper, $lower)),substring(sitemap:changefreq, 2))"/>
						</td>
						<td>
							<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,5)))"/>
						</td>
					</tr>
				</xsl:for-each>
			</table>
		</div>
	</xsl:template>
	
	
	<xsl:template match="sitemap:sitemapindex">
		<div id="content">
			<table cellpadding="5">
				<tr style="border-bottom:1px black solid;">
					<th>URL</th>
					<th>Last modified (GMT)</th>
				</tr>
				<xsl:for-each select="./sitemap:sitemap">
					<tr>
						<xsl:if test="position() mod 2 != 1">
							<xsl:attribute  name="class">high</xsl:attribute>
						</xsl:if>
						<td>
							<xsl:variable name="itemURL">
								<xsl:value-of select="sitemap:loc"/>
							</xsl:variable>
							<a href="{$itemURL}">
								<xsl:value-of select="sitemap:loc"/>
							</a>
						</td>
						<td>
							<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,5)))"/>
						</td>
					</tr>
				</xsl:for-each>
			</table>
		</div>
	</xsl:template>
</xsl:stylesheet>