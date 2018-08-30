<!-- <?php
/*** By Weerachai Nukitram ***/
/***  http://www.ThaiCreate.Com ***/







$objQuery= mysqli_query($connect,"SELECT * from customer WHERE 1" ) ;

?>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center"><a href="JavaScript:doCallAjax('CustomerID')">CustomerID</a></div></th>
    <th width="98"> <div align="center"><a href="JavaScript:doCallAjax('Name')">Name</a> </div></th>
    <th width="198"> <div align="center"><a href="JavaScript:doCallAjax('Email')">Email</a> </div></th>
    <th width="97"> <div align="center"><a href="JavaScript:doCallAjax('CountryCode')">CountryCode</a> </div></th>
    <th width="59"> <div align="center"><a href="JavaScript:doCallAjax('Budget')">Budget</a> </div></th>
    <th width="71"> <div align="center"><a href="JavaScript:doCallAjax('Used')">Used</a> </div></th>
  </tr>
<?php

while($objResult = mysqli_fetch_array($objQuery))

{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($connect);
?> -->