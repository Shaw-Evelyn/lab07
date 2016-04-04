<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <h1>Report 1 </h1>
        <table>
            <xsl:call-template name="Heading"/>          
            <xsl:apply-templates select="/timetable/weekday"/>           
                      
        </table>
    </xsl:template>
    
    
    <!-- template to extract the days of the week -->
    <xsl:template name="Heading">
        <tr>
            <th></th>
            <th>8:30</th>
            <th>9:30</th>
            <th>10:30</th>
            <th>11:30</th>
            <th>12:30</th>
            <th>13:30</th>
            <th>14:30</th>
            <th>15:30</th>
            <th>16:30</th>
             
        </tr>
        
    </xsl:template>
    
    <xsl:template match="weekday">
        <tr>
            <td>
                <xsl:value-of select="./@bookingday"/>
            </td>

            
            <td><xsl:for-each select="booking">
                    <xsl:if test="@slot='8:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> </td>
            <td><xsl:for-each select="booking">
                    <xsl:if test="@slot='9:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> </td>
            <td><xsl:for-each select="booking">
                    <xsl:if test="@slot='10:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> </td>
            <td><xsl:for-each select="booking">
                    <xsl:if test="@slot='11:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> </td>
            <td><xsl:for-each select="booking">
                    <xsl:if test="@slot='12:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> </td>
            <td>
                <xsl:for-each select="booking">
                    <xsl:if test="@slot='13:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            <td>
                <xsl:for-each select="booking">
                    <xsl:if test="@slot='14:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> 
            </td>
            <td>
                <xsl:for-each select="booking">
                    <xsl:if test="@slot='15:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each>
            </td>
            <td>
                <xsl:for-each select="booking">
                    <xsl:if test="@slot ='16:30'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each>
            </td>
        
        </tr>       
    </xsl:template> 
    
    <xsl:template match="booking">      

        <xsl:value-of select="coursename"/>
        <br/>
        <xsl:value-of select="room"/>
        <br/>
        <xsl:value-of select="type"/>
        <br/>
        <xsl:value-of select="instructor"/>        

        
    </xsl:template>       
    
    
    


</xsl:stylesheet>