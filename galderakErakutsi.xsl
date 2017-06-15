<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<HTML>
	<BODY>

		<TABLE class="table table-striped" >
			<THEAD><TR><TH>Gaia</TH><TH>Konplexutasuna</TH><TH>Galdera Enuntziatua</TH></TR></THEAD>
			<xsl:for-each select="/assessmentItems/assessmentItem" >
			<TR>
				<TD>
					
						<xsl:value-of select="@subject"/><BR/>
					
				</TD>
				
			<TD>
				
				<xsl:value-of select="@complexity"/><BR/>
				
			</TD>				
				
				<TD>
					<xsl:value-of select="itemBody"/> <BR/>
				
				</TD>
			</TR>
			</xsl:for-each>
		</TABLE>
		
	</BODY>
</HTML>
</xsl:template>
</xsl:stylesheet>