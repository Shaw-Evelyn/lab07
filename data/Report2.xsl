<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <h1>Report 2 </h1>
        <table>
            <xsl:call-template name="Heading"/>          
            <xsl:apply-templates select="/timetable/time"/>           
                      
        </table>
    </xsl:template>
    
    
    <!-- template to extract the days of the week -->
    <xsl:template name="Heading">
        <tr>
            <th></th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
               
        </tr>
        
    </xsl:template>
    
    <xsl:template match="time">
        <tr>
            <td>
                <xsl:value-of select="./@slot"/>
            </td>

            
            <td><xsl:for-each select="day">
                    <xsl:if test="@bookingday='Monday'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> </td>
            <td>
                <xsl:for-each select="day">
                    <xsl:if test="@bookingday='Tuesday'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            <td>
                <xsl:for-each select="day">
                    <xsl:if test="@bookingday='Wednesday'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> 
            </td>
            <td>
                <xsl:for-each select="day">
                    <xsl:if test="@bookingday='Thursday'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each>
            </td>
            <td><xsl:for-each select="day">
                    <xsl:if test="@bookingday='Friday'">
                        <xsl:apply-templates select="."/>
                    </xsl:if>            
                </xsl:for-each> </td>
        
        </tr>       
    </xsl:template> 
    
    <xsl:template match="day">      

        <xsl:value-of select="coursename"/>
        <br/>
        <xsl:value-of select="room"/>
        <br/>
        <xsl:value-of select="type"/>
        <br/>
        <xsl:value-of select="instructor"/>        

        
    </xsl:template>       
    
    
    


</xsl:stylesheet>