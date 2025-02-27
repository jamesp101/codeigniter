<!DOCTYPE html>
<html>
<head>
    <style>
    /* remove html margin */
    html {
        margin:0cm;
    }
    /* add margin to body */
    body {
        padding:1.5cm;
    }

    .mytable {
        border-collapse:collapse;
        width:10cm;
    }
    .mytable td {
        border:1px solid #000;
    }
    .page-break {
        page-break-before: always;
    }
    .something-absolute {
        border:1px solid #000;
        position:absolute;
        width:5cm;
        top:0cm;
        right:0cm;
    }
    #TBLR {
        border-top-style:none;
        border-bottom-style:none;
        border-left-style:none;
        border-right-style:none;
    }
    #TBL {
        border-top-style:none;
        border-bottom-style:none;
        border-left-style:none;
    }
    #TBR {
        border-top-style:none;
        border-bottom-style:none;
        border-right-style:none;
    }
    #TLR {
        border-top-style:none;
        border-left-style:none;
        border-right-style:none;
    }
    #BLR {
        border-bottom-style:none;
        border-left-style:none;
        border-right-style:none;
    }
    #TB {
        border-top-style:none;
        border-bottom-style:none;
    }
    #TL {
        border-top-style:none;
        border-left-style:none;
    }
    #TR {
        border-top-style:none;
        border-right-style:none;
    }
    #BL {
        border-bottom-style:none;
        border-left-style:none;
    }
    #BR {
        border-bottom-style:none;
        border-right-style:none;
    }
    #LR {
        border-left-style:none;
        border-right-style:none;
    }
    #T {
        border-top-style:none;
    }
    #B {
        border-bottom-style:none;
    }
    #L {
        border-left-style:none;
    }
    #R {
        border-right-style:none;
    }
    </style>
</head>
<body>
    <?php foreach ($dcr_data as $fetch): ?>

        <table class="mytable">
            <tr>
                <td style="height:0.50cm; width:0.11cm;" id="BR">
                </td>
                <td align="left" style="width:17.84cm;" id="BL">
                    <?php echo "<strong>".$fetch['School_DESC']."</strong>"; ?>
                </td>
            </tr>
            <tr>
                <td id="TR">
                </td>
                <td align="left" id="TL">
                    <?php echo "<strong>".$fetch['DCR_DESC']."</strong>"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="height:0.25cm;" id="B">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="height:0.021cm;" id="TB">
                </td>
            </tr>
        </table>
        <!-- Table 0A Title Ends (ST. DOMINIC COLLEGE OF ASIA & DOCUMENT CHANGE REQUEST) -->

        <!-- Table 0B Content Starts (DATE, TO, FROM, DCR NO.) -->
        <table class="mytable">
        <tr>
            <td style="height:0.5cm; width:0.11cm;" id="TBR">
            </td>
            <td style="width:1.51cm;" id="TBLR">
                <?php echo $fetch['Date_Of_Request_DESC']; ?>
            </td>
            <td style="width:0.8cm;" id="TBLR">
                <?php echo $fetch['COLON_Date_Of_Request_DESC']; ?>
            </td>
            <td style="width:4.8cm;" valign="bottom" align="center" id="TLR">
                <?php echo $fetch['Date_Of_Request']; ?>
            </td>
            <td style="width:3.13cm;" id="TBLR">
            </td>
            <td style="width:0.11cm;" id="TBLR">
            </td>
            <td style="width:2.3cm;" id="TBLR">
                <?php echo $fetch['DCR_No_DESC']; ?>
            </td>
            <td align="center" valign="bottom" style="width:4cm;" id="TLR">
                <?php echo $fetch['Year_Generated']."-".$fetch['DCRForm_ID'];?>
            </td>
            <td style="width:0.82cm;" id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="9" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="9" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td style="height:0.5cm;" id="TBR">
            </td>
            <td id="TBLR">
                <?php echo $fetch['To_Who_DESC']; ?>
            </td>
            <td id="TBLR">
                <?php echo $fetch['COLON_To_Who_DESC']; ?>
            </td>
            <td align="center" valign="bottom" id="TLR">
                <?php echo $fetch['To_Who']; ?>
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="9" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="9" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td style="height:0.5cm;" id="TBR">
            </td>
            <td id="TBLR">
                <?php echo $fetch['From_Office_DESC']; ?>
            </td>
            <td id="TBLR">
                <?php echo $fetch['COLON_From_Office_DESC']; ?>
            </td>
            <td align="center" valign="bottom" id="TLR">
                <?php echo $fetch['From_Office']; ?>
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="9" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="9" style="height:0.25cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 0B Content Ends (DATE, TO, FROM, DCR NO.) -->

        <!-- Table 0C Content Starts (Amend document, New document, Delete document) -->
        <table class="mytable">
        <tr>
            <td style="height:0.8cm; width:1.46cm;" id="BR">
            </td>
            <td align="center" style="width:3.2cm;" id="BLR">
                <?php echo $fetch['Amend_Document_DESC']; ?>
            </td>
            <td align="center" style="width:1cm;" id="BLR">
                <?php echo "["; ?>
                <?php
                if ($fetch['Type_Of_Request'] == 'Amend Document') {
                echo "<img src='" .'assets/img/pdf/tick.png'. "' height='13' width='13'/>";
                }
                else {
                echo str_repeat("&nbsp;", 3);
                }
                ?>
                <?php echo "]"; ?>
            </td>
            <td style="width:1.4cm;" id="BLR">
            </td>
            <td align="center" style="width:2.75cm;" id="BLR">
                <?php echo $fetch['New_Document_DESC']; ?>
            </td>
            <td align="center" style="width:1cm;" id="BLR">
                <?php echo "["; ?>
                <?php
                if ($fetch['Type_Of_Request'] == 'New Document') {
                echo "<img src='" .'assets/img/pdf/tick.png'. "' height='13' width='13'/>";
                }
                else {
                echo str_repeat("&nbsp;", 3);
                }
                ?>
                <?php echo "]"; ?>
            </td>
            <td style="width:1.8cm;" id="BLR">
            </td>
            <td align="center" style="width:3cm;" id="BLR">
                <?php echo $fetch['Delete_Document_DESC']; ?>
            </td>
            <td align="center" style="width:1cm;" id="BLR">
                <?php echo "["; ?>
                <?php
                if ($fetch['Type_Of_Request'] == 'Delete Document') {
                echo "<img src='" .'assets/img/pdf/tick.png'. "' height='13' width='13'/>";
                }
                else {
                echo str_repeat("&nbsp;", 3);
                }
                ?>
                <?php echo "]"; ?>
            </td>
            <td style="width:0.916cm;" id="BL">
            </td>
        </tr>
        <tr>
            <td colspan="10" style="height:0.01cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 0C Content Ends (Amend document, New document, Delete document) -->

        <!-- Table 1A Title Starts (1. DETAILS OF DOCUMENT) -->
        <table class="mytable">
        <tr>
            <td style="height:0.40cm; width:0.175cm;" id="BR">
            </td>
            <td align="left" valign="top" style="width:0.7525cm;" id="BLR">
                <strong>
                <?php echo $fetch['#_Details_Of_Document_DESC']; ?>
                </strong>
            </td>
            <td style="width:0.042cm;" id="BLR">
            </td>
            <td style="width:16.875cm;" id="BL">
                <strong>
                <?php echo $fetch['Details_Of_Document_DESC']; ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:0.01cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 1A Title Ends (1. DETAILS OF DOCUMENT) -->

        <!-- Table 1B Content Starts (Document Number, Document Title, Revision Status, Note) -->
        <table class="mytable">
        <tr>
            <td style="height:0.5cm; width:0.20cm;" id="TBR">
            </td>
            <td style="width:0.74cm;" id="TBLR">
            </td>
            <td style="width:0.042cm;" id="TBLR">
            </td>
            <td style="width:5.4cm;" id="TBLR">
                <?php echo $fetch['Document_Number_DESC']; ?>
            </td>
            <td align="center" style="width:0.5cm;" id="TBLR">
                <?php echo $fetch['COLON_Document_Number_DESC']; ?>
            </td>
            <td align="center" valign="bottom" style="width:6.46cm;" id="TLR">
                <?php echo $fetch['Document_No']; ?>
            </td>
            <td style="width:4.345cm;" id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td style="height:0.5cm;" id="TBR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
                <?php echo $fetch['Document_Title_DESC']; ?>
            </td>
            <td align="center" id="TBLR">
                <?php echo $fetch['COLON_Document_Title_DESC']; ?>
            </td>
            <td align="center" valign="bottom" id="TLR">
                <?php echo $fetch['Document_Title']; ?>
            </td>
            <td id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td style="height:0.5cm;" id="TBR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
                <?php echo $fetch['Revision_Status_DESC']; ?>
            </td>
            <td align="center" id="TBLR">
                <?php echo $fetch['COLON_Revision_Status_DESC']; ?>
            </td>
            <td align="center" valign="bottom" id="TLR">
                <?php echo $fetch['Revision_Status']; ?>
            </td>
            <td id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.021cm;" id="TB">
            </td>
        </tr>
        <tr>
            <td align="center" valign="bottom" colspan="7" style="height:0.5cm;" id="TB">
                <?php echo $fetch['Note_Attach_DraftCopy_DESC'];?>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="height:0.01cm;" id="T">
            </td>
        </tr>
        </table>
        <!-- Table 1B Content Ends (Document Number, Document Title, Revision Status, Note) -->

        <!-- Table 2A Title Starts (2. CHANGE(S) REQUESTED) -->
        <table class="mytable">
        <tr>
            <td style="height:0.40cm; width:0.175cm;" id="BR">
            </td>
            <td align="left" valign="top" style="width:0.7525cm;" id="BLR">
                <strong>
                <?php echo $fetch['#_Changes_Requested_DESC']; ?>
                </strong>
            </td>
            <td style="width:0.042cm;" id="BLR">
            </td>
            <td style="width:16.875cm;" id="BL">
                <strong>
                <?php echo $fetch['Changes_Requested_DESC']; ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:0.01cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 2A Title Ends (2. CHANGE(S) REQUESTED) -->

        <!-- Table 2B Content Starts (Changes Requested Content) -->
        <table class="mytable">
        <tr>
            <td style="height:1.7cm; width:0.8cm;" id="TBR">
            </td>
            <td align="center" style="width:8.43cm;" id="TBLR">
                <?php echo $fetch['Changes_Requested'];?>
            </td>
            <td style="width:2.5cm;" id="TBLR">
            </td>
            <td style="width:4.6cm;" id="TBLR">
            </td>
            <td style="width:1.46cm;" id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="5" style="height:0.03cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 2B Content Ends (Changes Requested Content) -->

        <!-- Table 2C Title Starts (REASON FOR THE CHANGE) -->
        <table class="mytable">
        <tr>
            <td style="height:0.40cm; width:0.175cm;" id="TBR">
            </td>
            <td align="left" style="width:0.7525cm;" id="TBLR">
            </td>
            <td style="width:0.042cm;" id="TBLR">
            </td>
            <td style="width:16.875cm;" id="TBL">
                <strong><?php echo $fetch['Reason_For_The_Change_DESC']; ?></strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:0.01cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 2C Title Ends (REASON FOR THE CHANGE) -->
        <!-- Table 2D Content Starts (Reason For The Change Content) -->
        <table class="mytable">
        <tr>
            <td style="height:1.7cm; width:0.8cm;" id="TBR">
            </td>
            <td align="center" style="width:8.43cm;" id="TBLR">
                <?php echo $fetch['Reason_For_The_Change'];?>
            </td>
            <td style="width:2.606cm;" id="TBLR">
            </td>
            <td align="center" valign="bottom" style="width:4.6cm;" id="TLR">
                <?php echo $fetch['Requested_By'];?>
            </td>
            <td style="width:1.355cm;" id="TBL">
            </td>
        </tr>
        <tr>
            <td style="height:0.8cm;" id="TBR">
            </td>
            <td id="TBLR">
            </td>
            <td id="TBLR">
            </td>
            <td align="center" id="BLR">
                <?php echo $fetch['Requested_By_DESC'];?>
            </td>
            <td id="TBL">
            </td>
        </tr>
        <tr>
            <td colspan="5" style="height:0.01cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 2D Content Ends (Reason For The Change Content) -->

        <!-- Table 3A Content Starts -->
        <table class="mytable">
            <tr>
                <td style="width:0.15cm;" id="BR">&nbsp;</td>
                <td style="width:0.20cm;" id="BLR">
                    <strong>
                    <?php echo $fetch['#_QAIE_Director_Comments_DESC']; ?>
                    </strong>
                </td>
                <td style="width:0.425cm;" id="BLR">&nbsp;</td>
                <td style="width:9.5cm;" id="BLR">
                    <strong>
                    <?php echo $fetch['QAIE_Director_Comments_DESC']; ?>
                    </strong>
                </td>
                <td style="width:1.346cm;" id="BLR">&nbsp;</td>
                <td style="width:4.59cm;" rowspan="3" align="center" valign="bottom" id="BLR">
                    <?php
                    if($fetch['ESignature_DoQ']!=''){
                    echo "<img src='profile_settings/e_signature/".$fetch['ESignature_DoQ']."' width='170' height='45' />";
                    }
                    else if($fetch['ESignature_DoQ']==''){
                    echo "<img src='profile_settings/e_signature/no_e_signature.png' width='170' height='45' />";
                    }
                    ?>
                    <br/>
                    <?php
                    if($fetch['Name_Of_QAIE_Director']!=''&&$fetch['Date_Of_QAIE_Director_Action']!=''){
                    echo $fetch['Name_Of_QAIE_Director'];
                    echo " / ";
                    echo "<br/>";
                    echo $fetch['Date_Of_QAIE_Director_Action'];
                    }
                    else if($fetch['Name_Of_QAIE_Director']==''&&$fetch['Date_Of_QAIE_Director_Action']==''){
                    echo "&nbsp;";
                    echo "<br/>";
                    echo "&nbsp;";
                    }
                    ?>
                </td>
                <td style="width:1.36cm;" id="BL">&nbsp;</td>
            </tr>
            <tr>
                <td style="height:0.88cm; width:0.175cm;" id="TBR"></td>
                <td id="TBLR"></td>
                <td id="TBLR"></td>
                <td rowspan="2" align="center" id="TBLR">
                    <?php
                    if($fetch['QAIE_Directors_Comments']!=''){
                    echo $fetch['QAIE_Directors_Comments'];
                    }
                    else if($fetch['QAIE_Directors_Comments']==''){
                    echo "&nbsp;";
                    }
                    ?>
                </td>
                <td id="TBLR"></td>
                <!-- <td>rowspan</td> -->
                <td id="TBL"></td>
            </tr>
            <tr>
                <td style="height:0.88cm;" id="TBR"></td>
                <td id="TBLR"></td>
                <td id="TBLR"></td>
                <!-- <td>rowspan</td> -->
                <td id="TBLR"></td>
                <!-- <td>rowspan</td> -->
                <td id="TBL"></td>
            </tr>
        </table>
        <!-- Table 3A Content Ends -->

        <!-- Table 3B Content Starts -->
        <table class="mytable">
            <tr>
                <td style="height:0.8cm; width:1.00cm;" id="TBR">
                </td>
                <td align="center" style="width:2.9cm;" id="TBLR">
                <?php echo $fetch['Request_Denied_DESC']; ?>
                </td>
                <td align="center" style="width:1cm;" id="TBLR">
                <?php echo "["; ?>
                <?php
                if ($fetch['Request_Status'] == 'Request Denied') {
                echo "<img src='" .'assets/img/pdf/tick.png'. "' height='13' width='13'/>";
                }
                else {
                echo str_repeat("&nbsp;", 3);
                }
                ?>
                <?php echo "]";?>
                </td>
                <td style="width:1.085cm;" id="TBLR">
                </td>
                <td align="center" style="width:3.31cm;" id="TBLR">
                <?php echo $fetch['Request_Accepted_DESC']; ?>
                </td>
                <td align="center" style="width:1cm;" id="TBLR">
                <?php echo "["; ?>
                <?php
                if ($fetch['Request_Status'] == 'Request Accepted') {
                echo "<img src='" .'assets/img/pdf/tick.png'. "' height='13' width='13'/>";
                }
                else {
                echo str_repeat("&nbsp;", 3);
                }
                ?>
                <?php echo "]";?>
                </td>
                <td id="TBLR" style="width:1.3195cm;">
                </td>
                <td align="center" style="width:4.6cm;" id="BLR">
                <?php echo $fetch['Signature/Date_DESC'];?>
                </td>
                <td id="TBL" style="width:1.369cm;">
                </td>
            </tr>
            <tr>
                <td colspan="9" style="height:0.01cm;" id="TB">
                </td>
            </tr>
        </table>
        <!-- Table 3B Content Ends -->

        <!-- Table 4A Title Starts -->
        <table class="mytable">
            <tr>
                <td style="height:0.40cm; width:0.175cm;" id="BR">
                </td>
                <td align="left" valign="top" style="width:0.7525cm;" id="BLR">
                    <strong>
                    <?php echo $fetch['#_Approving_Authority_DESC']; ?>
                    </strong>
                </td>
                <td style="width:0.042cm;" id="BLR">
                </td>
                <td style="width:16.875cm;" id="BL">
                    <strong>
                    <?php echo $fetch['Approving_Authority_DESC']; ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="height:0.01cm;" id="TB">
                </td>
            </tr>
        </table>
        <!-- Table 4A Title Ends -->

        <!-- Table 4B Content Starts -->
        <table class="mytable">
            <tr>
                <td style="width:1.36cm; height:1.75cm;" id="TBR">&nbsp;</td>
                <td style="width:6.3cm;" align="center" valign="bottom" id="TLR">
                    <?php
                    if($fetch['ESignature_DeptHead']!=''){
                    echo "<img src='profile_settings/e_signature/".$fetch['ESignature_DeptHead']."' width='165' height='37.5' />";
                    }
                    else if($fetch['ESignature_DeptHead']==''){
                    echo "<img src='profile_settings/e_signature/no_e_signature.png' width='165' height='37.5' />";
                    }
                    ?>
                    <br/>
                    <?php echo $fetch['Name_Of_Approving_Authority'];?>
                </td>
                <td style="width:4.25cm;" id="TBLR">&nbsp;</td>
                <td style="width:4.53cm;" align="center" valign="bottom" id="TBLR">
                    <?php echo $fetch['Date_Of_Approval'];?>
                </td>
                <td style="width:1.35cm;" id="TBL">&nbsp;</td>
            </tr>
            <tr>
                <td style="height:0.825cm;" id="TBR"></td>
                <td align="center" id="BLR">
                    <?php echo $fetch['Signature_Over_Printed_Name_DESC'];?>
                </td>
                <td id="TBLR"></td>
                <td align="center" id="BLR">
                    <?php echo $fetch['Date_Of_Approval_DESC'];?>
                </td>
                <td id="TBL"></td>
            </tr>
        </table>
        <!-- Table 4B Content Ends -->

        <!-- Table 5A Title Starts -->
        <table class="mytable">
        <tr>
            <td style="height:0.40cm; width:0.175cm;" id="BR">
            </td>
            <td align="left" valign="top" style="width:0.7525cm;" id="BLR">
                <strong>
                <?php echo $fetch['#_Document_Status_DESC']; ?>
                </strong>
            </td>
            <td style="width:0.042cm;" id="BLR">
            </td>
            <td style="width:16.875cm;" id="BL">
                <strong>
                <?php echo $fetch['Document_Status_DESC']; ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="height:0.44cm;" id="TB">
            </td>
        </tr>
        </table>
        <!-- Table 5A Title Ends -->

        <!-- Table 5B Content Starts -->
        <table class="mytable">
        <tr>
            <td style="height:0.45cm; width:0.85cm;" id="TBR">
                <!-- ##1 -->
            </td>
            <td align="center" valign="bottom" rowspan="2" style="width:4cm;" id="TBLR">
                <?php echo $fetch['New_Document_Status_DESC'];?>
            </td>
            <td align="center" valign="bottom" rowspan="2" style="width:1.3cm;" id="TBLR">
                <?php echo $fetch['New_Document_No_DESC'];?>
            </td>
            <td align="center" valign="bottom" rowspan="2" style="width:2.5cm;" id="TLR">
                <?php echo $fetch['New_Document_No'];?>
            </td>
            <td align="center" valign="bottom" rowspan="2" style="width:1.8cm;" id="TBLR">
                <?php echo $fetch['New_Document_Version_DESC'];?>
            </td>
            <td align="center" valign="bottom" rowspan="2" style="width:2.2cm;" id="TLR">
                <?php echo $fetch['New_Document_Version'];?>
            </td>
            <td align="center" valign="bottom" rowspan="2" style="width:2.0cm;" id="TBLR">
                <?php echo $fetch['New_Document_Revision_DESC']; ?>
            </td>
            <td align="center" valign="bottom" rowspan="2" style="width:2.28cm;" id="TLR">
                <?php echo $fetch['New_Document_Revision'];?>
            </td>
            <td style="width:0.65cm;" id="TBL">
                <!-- ##3 -->
            </td>
        </tr>
        <tr>
            <td style="height:0.45cm;" id="TBR">
                <!-- ##2 -->
            </td>
            <td id="TBL">
                <!-- ##4 -->
            </td>
        </tr>
        <tr>
            <td colspan="9" style="height:0.20cm;" id="T">
            </td>
        </tr>
        </table>
        <!-- Table 5B Content Ends -->

        <!-- Table 5C Footer Starts -->
        <table class="mytable">
        <tr>
            <td style="height:0.55cm; width:0.175cm;" id="R">
            </td>
            <td colspan="8" style="width:17.775cm;" id="L">
                <strong><?php echo $fetch['Revision_Date_Version_DESC'];?></strong>
            </td>
        </tr>
        </table>
        <!-- Table 5C Footer Ends -->

    <?php endforeach; ?>
</body>
</html>
