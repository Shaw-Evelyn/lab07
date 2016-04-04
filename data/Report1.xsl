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
            <xsl:call-template name="RowHeading"/>
            
                      
        </table>
    </xsl:template>
    
    
    <!-- template to extract the days of the week -->
    <xsl:template name="Heading">
        <thead>
            <tr>
                <th></th>
                <xsl:for-each select="/timetable/weekday">
                    <th>
                        <xsl:value-of select="./@bookingday"/>
                    </th>
                </xsl:for-each>              
                <xsl:for-each select="/timetable/time/day">
                    <th>
                        <xsl:value-of select="./@bookingday"/>
                    </th>
                </xsl:for-each>
                <th>
                    <xsl:for-each select="/timetable/course/coursetype/dayofweek/value">
                </th>
            </xsl:for-each>
               
            </tr>
        </thead>
        
    </xsl:template>
    
    <xsl:template name="RowHeading">

            <tr>
                <td>
                    <xsl:for-each select="/timetable/weekday/booking">
                    <xsl:value-of select="./@slot"/>
                    </xsl:for-each>
                </td>   
            </tr>
        
    </xsl:template>
    
    
    


</xsl:stylesheet>