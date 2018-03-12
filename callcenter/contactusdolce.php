<?php


$s_page=get_site_static_page(2);

?>

<div style="<?=$s_page['style_page']?>;">

    <div class="awrapper">
        <h1 class="t-peta" style="<?=$s_page['style_page_title']?>;"><center>
                <?if($mode=="contactus"){ ?>
                <?=aren($lang,"ÇáÇÊÕÇá ÈäÇ","Contact us ") ?>
                <?}else{?>
                    <?=aren($lang,"ÇáæÙÇÆÝ","Careers") ?>
                <?}?>
            </center>
        </h1>
        <?if($mode=="contactus"){ ?>
        <div id="map" style="position: relative; overflow: hidden; background-color: rgb(229, 227, 223);">

            <style>
                .google-maps {
                    position: relative;
                    padding-bottom: 75%; // This is the aspect ratio
                height: 0;
                    overflow: hidden;
                }
                .google-maps iframe {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100% !important;
                    height: 100% !important;
                }
            </style>

            <div class="google-maps">
                <!iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804" width="600" height="450" frameborder="0" style="border:0"><!/iframe>
                <!iframe src="https://www.google.com/maps/embed/key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU& 25%C2%B017'13.7%22N+55%C2%B021'54.9%22E/@25.2869647,55.3602802,16z" width="600" height="450" frameborder="0" style="border:0"><!/iframe>
                <!iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU&q=25.28713,55.3652369"><!/iframe>
                <iframe src="<?=$s_page['link_position']?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

        </div>
        <?}?>
    </div>

  <!--here form-->
<form id="contactusform" action="index.php?dir=php&page=contact2&ex=2" method="post" enctype="multipart/form-data">
        <div id="faqs" class="endless-faqs">
            <div class="column-container">


<? $static=0;
if($static>0)
{         ?>    <div class="leftcol" style="float:left;">
                    <div class="item" style="<?=linebegginningtextalign($lang)?>">
                        <div class="answer"><br>
                        </div>      </div>
                    <div class="item" style="<?=linebegginningtextalign($lang)?>" >

                        <div class="question">M/S Dolce CO. L.L.C</div>

                        <?=aren($lang,"","") ?>
                        <div class="answer">          <p> 		  	<?=aren($lang,"ãßÊÈ ÇáÔÑßÉ","Corporate office") ?> 	  			 		   		  		  <br>
                                <?=aren($lang,"ÑÞã ÇáãßÊÈ :ÈäÇÁ ÑÞã M10 ÏÈí","Office No: M10,Building:  AlMazer&nbsp; Lagoons, Dubai	") ?>  	   			<br>
                                <?=aren($lang,"ÇáÅãÇÑÇÊ ÇáÚÑÈíÉ ÇáãÊÍÏÉ"," United Arab  Emirates	") ?>	   			<br>
                                <?=aren($lang,"ÇáåÇÊÝ"," Tel : ") ?> 		   			<a name="_GoBack"></a>0097142556733<br>
                                <?=aren($lang,"ÇáãæÞÚ ÇáÇáßÊÑæäí	"," Website:") ?>   		   			<a href="http://WWW.dolcemondo.ae">WWW.dolcemondo.ae</a> <br>
                                <?=aren($lang,"ÇáÈÑíÏ ÇáÇáßÊÑæäí"," Email") ?>   		   						:info@dolcemondo.ae</p>          <br>
                        </div>      </div>
                    <div class="item" style="<?=linebegginningtextalign($lang)?>">
                        <div class="question">	 <?=aren($lang,"áãÒíÏ ãä ÇáãÚáæãÇÊ Íæá ÝÑæÚäÇ:","FOR MORE INFORMATION ABOUT OUR BRANCHES : ") ?>	      		</div>
                        <div class="answer">      <a href="index.php?page=dolcebranches&ex=2&dir=php&id=976&lang=<?=$lang?>">  	  <?=aren($lang,"ÃäÞÑ åäÇ","click here") ?>        	  </a>
                        </div>      </div>
                </div>

<?}
                else
                {?>
                    <div class="leftcol" style="<?=$s_page['style_page_details']?>float:left;"><?
                   echo aren($lang, $s_page['ar_page_data'], $s_page['en_page_data']);
                        ?></div><?
                }
?>
                <div class="rightcol" style="float:right;">
                    <div class="item">
                        <div class="question">
                        </div>
                        <div class="answer" style=" direction: <?=aren($lang,"rtl","ltr")?>;<?=linebegginningtextalign($lang)?>">
                            <div id="contact_form" role="dialog">
                                <br clear="all">
                                <table border="0" align="" cellpadding="1" cellspacing="1" style=" direction: <?=aren($lang,"rtl","ltr")?>;<?=linebegginningtextalign($lang)?>">
                                    <tbody><tr>
                                        <td width="134" height="25" align="" nowrap="nowrap"><div class="title_main"><strong>		  	<?=aren($lang,"ÇáÇÓã ÇáßÇãá* :","Full Name *:") ?> 	  		  		  </strong></div></td>
                                        <td width="323" align=""><div></div></td>
                                    </tr>
                                    <tr>
                                        <td height="52" colspan="2" align="" nowrap="nowrap"><table width="200" border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td>
                                                        <select name="title" id="title" class="selectArea" style="width: 66px;color: black;">
                                                            <option style="color: black;"><?=aren($lang,"ÇáÓíÏ","Mr.") ?></option>
                                                            <option style="color: black;"><?=aren($lang,"ÇáÓíÏÉ","Ms.") ?></option>
                                                            <option style="color: black;"><?=aren($lang,"ÇáÇäÓÉ","Miss.") ?></option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="fname" size="18" name="fname" value="" style="width: 120px;">
                                                    </td>
                                                    <td>
                                                        <input id="lname" size="18" name="lname" value="" style="width: 120px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>&nbsp;&nbsp;			  			 <?=aren($lang,"ÇáÇÓã ÇáÇæá","First Name") ?>  			  </td>
                                                    <td>&nbsp;&nbsp;			  			<?=aren($lang,"ÇáÇÓã ÇáÇÎíÑ","Last Name	") ?>   		  </td>
                                                </tr>
                                                </tbody></table></td>
                                    </tr>
                                    <tr>
                                        <td height="10" align="" nowrap="nowrap"></td>
                                        <td align=""></td>
                                    </tr>
                                    <tr>
                                        <td height="29" align="" nowrap="nowrap"><div class="title_main"><strong>            <?=aren($lang,"ÇáÚäæÇä","Address") ?>            :          </strong></div></td><td align=""></td>
                                    </tr>
                                    <tr>
                                        <td height="25" colspan="2" align="" nowrap="nowrap"><input style="width: 327px;" id="address" size="50" name="address" value=""></td>
                                    </tr>
                                    <tr>
                                        <td height="25" colspan="2" align="" nowrap="nowrap"></td>
                                    </tr>

                                    <tr>

                                    </tr><tr>
                                        <td height="25" colspan="2" align="" nowrap="nowrap"><table width="250" border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td width="108"><input style="width: 113px;" id="state" size="18" name="state" value=""></td>
                                                    <td width="90"><input style="width: 113px;" id="city" size="15" name="city" value=""></td>
                                                    <td width="52"><input style="width: 70px;" id="zip" size="7" name="zip" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;			  			 <?=aren($lang,"ÇáãäØÞÉ","State") ?>  			  			  </td>
                                                    <td>&nbsp;&nbsp;			  			<?=aren($lang,"ÇáãÏíäÉ","City") ?>    </td>
                                                    <td>&nbsp;&nbsp;			  			<?=aren($lang,"ÑãÒ ÇáÈáÏ","Zip Code") ?> 		  </td>
                                                </tr>
                                                </tbody></table></td>
                                    </tr>
                                    <tr><td>&nbsp;</td></tr>
                                    <tr>
                                        <td height="25" colspan="2" align="" nowrap="nowrap"><div class="title_main"><strong>  <?=aren($lang,"ÇáÈáÏ","Country") ?>     :         </strong></div></td></tr>
                                    <tr>
                                        <style>
                                            #pp option{
                                                color: black;
                                            }
                                        </style>
                                        <td height="25" colspan="2" align="" nowrap="nowrap"><strong>
                                                <select id="nationality" name="nationality" style="width: 250px;color: black;">
                                                    <? $lang1=2;?>
                                                    <option value="United Arab Emirates"><?=aren($lang1,"","")?><?=aren($lang1,"ÇáÇãÇÑÇÊ ÇáÚÑÈíÉ ÇáãÊÍÏÉ","United Arab Emirates")?></option>
                                                    <option value="Afghanistan"><?=aren($lang1,"","")?><?=aren($lang1,"ÇÝÛÇäÓÊÇä","Afghanistan")?> </option>
                                                    <option value="Albania"><?=aren($lang1,"","")?><?=aren($lang1,"ÇáÈÇäíÇ","Albania")?> </option>
                                                    <option value="Algeria"><?=aren($lang1,"","")?><?=aren($lang1,"ÇáÌÒÇÆÑ","Algeria")?> </option>
                                                    <option value="American Samoa"><?=aren($lang1,"","")?><?=aren($lang1,"ÓæãÇ ÇáÃãÑíßíÉ","American Samoa")?> </option>
                                                    <option value="Andorra"><?=aren($lang1,"","")?><?=aren($lang1,"ÇäÏæÑÇ","Andorra ")?></option>
                                                    <option value="Angola"><?=aren($lang1,"","")?><?=aren($lang1,"ÇäÌæáÇ","Angola")?> </option>
                                                    <option value="Anguilla"><?=aren($lang1,"","")?><?=aren($lang1,"ÇäÌæíáÇ","Anguilla ")?></option>
                                                    <option value="Antarctica"><?=aren($lang1,"","")?><?=aren($lang1,"ÇáÞÇÑÉ ÇáÞØÈíÉ ÇáÌäæÈíÉ","Antarctica")?> </option>
                                                    <option value="Antigua And Barbuda"><?=aren($lang1,"","")?><?=aren($lang1,"ÇäÊíßÇ æ ÈÇÑÈæÏÇ","Antigua And Barbuda")?> </option>
                                                    <option value="Argentina"><?=aren($lang1,"","")?><?=aren($lang1,"ÇáÇÑÌäÊíä","Argentina")?> </option>
                                                    <option value="Armenia"><?=aren($lang1,"","")?><?=aren($lang1,"ÇÑãíäíÇ","Armenia")?> </option>
                                                    <option value="Aruba"><?=aren($lang1,"","")?><?=aren($lang1,"ÇÑæÈÇ","Aruba")?> </option>
                                                    <option value="Australia"><?=aren($lang1,"","")?><?=aren($lang1,"ÇÓÊÑÇáíÇ","Australia")?> </option>
                                                    <option value="Austria"><?=aren($lang1,"","")?><?=aren($lang1,"ÇÓÊíÑíÇ","Austria")?> </option>
                                                    <option value="Azerbaijan"><?=aren($lang1,"","")?><?=aren($lang1,"ÇÒÑÈíÌÇä","Azerbaijan")?> </option>
                                                    <option value="Bahamas"><?=aren($lang1,"","")?><?=aren($lang1,"ÈÇåÇãÇ","Bahamas")?> </option>
                                                    <option value="Bahrain"><?=aren($lang1,"","")?><?=aren($lang1,"ÇáÈÍÑíä","Bahrain")?> </option>
                                                    <option value="Bangladesh"><?=aren($lang1,"","")?><?=aren($lang1,"ÈäÌáÇÏÔ","Bangladesh")?> </option>
                                                    <option value="Barbados"><?=aren($lang1,"","")?><?=aren($lang1,"ÈÇÑÈÇÏæÓ","Barbados")?> </option>
                                                    <option value="Belarus"><?=aren($lang1,"","")?><?=aren($lang1,"ÈíáÇÑæÓíÇ","Belarus")?> </option>
                                                    <option value="Belgium"><?=aren($lang1,"","")?><?=aren($lang1,"","Belgium")?> </option>
                                                    <option value="Belize"><?=aren($lang1,"","")?><?=aren($lang1,"","Belize")?> </option>
                                                    <option value="Benin"><?=aren($lang1,"","")?><?=aren($lang1,"Èäíä","Benin")?> </option>
                                                    <option value="Bermuda"><?=aren($lang1,"","")?><?=aren($lang1,"","Bermuda")?> </option>
                                                    <option value="Bhutan"><?=aren($lang1,"","")?><?=aren($lang1,"","Bhutan")?> </option>
                                                    <option value="Bolivia"><?=aren($lang1,"","")?><?=aren($lang1,"","Bolivia")?> </option>
                                                    <option value="Bosnia And Herzegowina"><?=aren($lang1,"","")?><?=aren($lang1,"","Bosnia And Herzegowina")?> </option>
                                                    <option value="Botswana"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Botswana </option>
                                                    <option value="Bouvet Island"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Bouvet Island </option>
                                                    <option value="Brazil"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Brazil </option>
                                                    <option value="British Indian Ocean Territory"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>British Indian Ocean Territory </option>
                                                    <option value="Brunei Darussalam"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Brunei Darussalam </option>
                                                    <option value="Bulgaria"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Bulgaria </option>
                                                    <option value="Burkina Faso"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Burkina Faso </option>
                                                    <option value="Burundi"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Burundi </option>
                                                    <option value="Cambodia"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cambodia </option>
                                                    <option value="Cameroon"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cameroon </option>
                                                    <option value="Canada"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Canada </option>
                                                    <option value="Cape Verde"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cape Verde </option>
                                                    <option value="Cayman Islands"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cayman Islands </option>
                                                    <option value="Central African Republic"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Central African Republic </option>
                                                    <option value="Chad"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Chad </option>
                                                    <option value="Chile"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Chile </option>
                                                    <option value="China"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>China </option>
                                                    <option value="Christmas Island"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Christmas Island </option>
                                                    <option value="Cocos (Keeling) Islands"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cocos (Keeling) Islands </option>
                                                    <option value="Colombia"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Colombia </option>
                                                    <option value="Comoros"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Comoros </option>
                                                    <option value="Congo"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Congo </option>
                                                    <option value="Cook Islands"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cook Islands </option>
                                                    <option value="Costa Rica"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Costa Rica </option>
                                                    <option value="Cote D'Ivoire"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cote D'Ivoire </option>
                                                    <option value="Croatia"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Croatia </option>
                                                    <option value="Cuba"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cuba </option>
                                                    <option value="Cyprus"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Cyprus </option>
                                                    <option value="Czech Republic"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Czech Republic </option>
                                                    <option value="Denmark"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Denmark </option>
                                                    <option value="Djibouti"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Djibouti </option>
                                                    <option value="Dominica"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Dominica </option>
                                                    <option value="Dominican Republic"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Dominican Republic </option>
                                                    <option value="East Timor"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>East Timor </option>
                                                    <option value="Ecuador"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Ecuador </option>
                                                    <option value="Egypt"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Egypt </option>
                                                    <option value="El Salvador"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>El Salvador </option>
                                                    <option value="Equatorial Guinea"><?=aren($lang1,"","")?><?=aren($lang1,"","")?>Equatorial Guinea </option>
                                                    <option value="Eritrea"><?=aren($lang1,"","")?>Eritrea </option>
                                                    <option value="Estonia"><?=aren($lang1,"","")?>Estonia </option>
                                                    <option value="Ethiopia"><?=aren($lang1,"","")?>Ethiopia </option>
                                                    <option value="Falkland Islands"><?=aren($lang1,"","")?>Falkland Islands </option>
                                                    <option value="Faroe Islands"><?=aren($lang1,"","")?>Faroe Islands </option>
                                                    <option value="Fiji"><?=aren($lang1,"","")?>Fiji </option>
                                                    <option value="Finland"><?=aren($lang1,"","")?>Finland </option>
                                                    <option value="France"><?=aren($lang1,"","")?>France </option>
                                                    <option value="France, Metropolitan"><?=aren($lang1,"","")?>France, Metropolitan </option>
                                                    <option value="French Guiana"><?=aren($lang1,"","")?>French Guiana </option>
                                                    <option value="French Polynesia "><?=aren($lang1,"","")?>French Polynesia </option>
                                                    <option value="French Southern Territories"><?=aren($lang1,"","")?>French Southern Territories </option>
                                                    <option value="Gabon"><?=aren($lang1,"","")?>Gabon </option>
                                                    <option value="Gambia"><?=aren($lang1,"","")?>Gambia </option>
                                                    <option value="Georgia "><?=aren($lang1,"","")?>Georgia </option>
                                                    <option value="Germany"><?=aren($lang1,"","")?>Germany </option>
                                                    <option value="Ghana"><?=aren($lang1,"","")?>Ghana </option>
                                                    <option value="Gibraltar"><?=aren($lang1,"","")?>Gibraltar </option>
                                                    <option value="Greece"><?=aren($lang1,"","")?>Greece </option>
                                                    <option value="Greenland"><?=aren($lang1,"","")?>Greenland </option>
                                                    <option value="Grenada"><?=aren($lang1,"","")?>Grenada </option>
                                                    <option value="Guadeloupe"><?=aren($lang1,"","")?>Guadeloupe </option>
                                                    <option value="Guam"><?=aren($lang1,"","")?>Guam </option>
                                                    <option value="Guatemala"><?=aren($lang1,"","")?>Guatemala </option>
                                                    <option value="Guinea"><?=aren($lang1,"","")?>Guinea </option>
                                                    <option value="Guinea-Bissau"><?=aren($lang1,"","")?>Guinea-Bissau </option>
                                                    <option value="Guyana"><?=aren($lang1,"","")?>Guyana </option>
                                                    <option value="Haiti"><?=aren($lang1,"","")?>Haiti </option>
                                                    <option value="Heard And Mc Donald Islands"><?=aren($lang1,"","")?>Heard And Mc Donald Islands </option>
                                                    <option value="Honduras"><?=aren($lang1,"","")?>Honduras </option>
                                                    <option value="Hong Kong"><?=aren($lang1,"","")?>Hong Kong </option>
                                                    <option value="Hungary"><?=aren($lang1,"","")?>Hungary </option>
                                                    <option value="Iceland"><?=aren($lang1,"","")?>Iceland </option>
                                                    <option value="India"><?=aren($lang1,"","")?>India </option>
                                                    <option value="Indonesia"><?=aren($lang1,"","")?>Indonesia </option>
                                                    <option value="Iran"><?=aren($lang1,"","")?>Iran </option>
                                                    <option value="Ireland"><?=aren($lang1,"","")?>Ireland </option>
                                                    <option value="Italy "><?=aren($lang1,"","")?>Italy </option>
                                                    <option value="Jamaica"><?=aren($lang1,"","")?>Jamaica </option>
                                                    <option value="Japan"><?=aren($lang1,"","")?>Japan </option>
                                                    <option value="Jordan"><?=aren($lang1,"","")?>Jordan </option>
                                                    <option value="Kazakhstan"><?=aren($lang1,"","")?>Kazakhstan </option>
                                                    <option value="Kenya"><?=aren($lang1,"","")?>Kenya </option>
                                                    <option value="Kiribati"><?=aren($lang1,"","")?>Kiribati </option>
                                                    <option value="North Korea (People's Republic Of Korea)"><?=aren($lang1,"","")?>North Korea (People's Republic Of Korea) </option>
                                                    <option value="South Korea (Republic Of Korea)"><?=aren($lang1,"","")?>South Korea (Republic Of Korea) </option>
                                                    <option value="Kuwait"><?=aren($lang1,"","")?>Kuwait </option>
                                                    <option value="Kyrgyzstan"><?=aren($lang1,"","")?>Kyrgyzstan </option>
                                                    <option value="Lao People's Republic"><?=aren($lang1,"","")?>Lao People's Republic </option>
                                                    <option value="Latvia"><?=aren($lang1,"","")?>Latvia </option>
                                                    <option value="Lebanon"><?=aren($lang1,"","")?>Lebanon </option>
                                                    <option value="Lesotho"><?=aren($lang1,"","")?>Lesotho </option>
                                                    <option value="Liberia"><?=aren($lang1,"","")?>Liberia </option>
                                                    <option value="Libyan Arab Jamahiriya"><?=aren($lang1,"","")?>Libyan Arab Jamahiriya </option>
                                                    <option value="Liechtenstein"><?=aren($lang1,"","")?>Liechtenstein </option>
                                                    <option value="Lithuania"><?=aren($lang1,"","")?>Lithuania </option>
                                                    <option value="Luxembourg"><?=aren($lang1,"","")?>Luxembourg </option>
                                                    <option value="Macau"><?=aren($lang1,"","")?>Macau </option>
                                                    <option value="Macedonia"><?=aren($lang1,"","")?>Macedonia </option>
                                                    <option value="Madagascar"><?=aren($lang1,"","")?>Madagascar </option>
                                                    <option value="Malawi"><?=aren($lang1,"","")?>Malawi </option>
                                                    <option value="Malaysia"><?=aren($lang1,"","")?>Malaysia </option>
                                                    <option value="Maldives"><?=aren($lang1,"","")?>Maldives </option>
                                                    <option value="Mali"><?=aren($lang1,"","")?>Mali </option>
                                                    <option value="Malta"><?=aren($lang1,"","")?>Malta </option>
                                                    <option value="Marshall Islands"><?=aren($lang1,"","")?>Marshall Islands </option>
                                                    <option value="Martinique"><?=aren($lang1,"","")?>Martinique </option>
                                                    <option value="Mauritania"><?=aren($lang1,"","")?>Mauritania </option>
                                                    <option value="Mauritius"><?=aren($lang1,"","")?>Mauritius </option>
                                                    <option value="Mayotte"><?=aren($lang1,"","")?>Mayotte </option>
                                                    <option value="Mexico"><?=aren($lang1,"","")?>Mexico </option>
                                                    <option value="Micronesia"><?=aren($lang1,"","")?>Micronesia </option>
                                                    <option value="Moldova"><?=aren($lang1,"","")?>Moldova </option>
                                                    <option value="Monaco"><?=aren($lang1,"","")?>Monaco </option>
                                                    <option value="Mongolia"><?=aren($lang1,"","")?>Mongolia </option>
                                                    <option value="Montserrat"><?=aren($lang1,"","")?>Montserrat </option>
                                                    <option value="Morocco"><?=aren($lang1,"","")?>Morocco </option>
                                                    <option value="Mozambique"><?=aren($lang1,"","")?>Mozambique </option>
                                                    <option value="Myanmar"><?=aren($lang1,"","")?>Myanmar </option>
                                                    <option value="Namibia"><?=aren($lang1,"","")?>Namibia </option>
                                                    <option value="Nauru"><?=aren($lang1,"","")?>Nauru </option>
                                                    <option value="Nepal"><?=aren($lang1,"","")?>Nepal </option>
                                                    <option value="Netherlands"><?=aren($lang1,"","")?>Netherlands </option>
                                                    <option value="Netherlands Antilles"><?=aren($lang1,"","")?>Netherlands Antilles </option>
                                                    <option value="New Caledonia"><?=aren($lang1,"","")?>New Caledonia </option>
                                                    <option value="New Zealand"><?=aren($lang1,"","")?>New Zealand </option>
                                                    <option value="Nicaragua"><?=aren($lang1,"","")?>Nicaragua </option>
                                                    <option value="Niger"><?=aren($lang1,"","")?>Niger </option>
                                                    <option value="Nigeria"><?=aren($lang1,"","")?>Nigeria </option>
                                                    <option value="Niue"><?=aren($lang1,"","")?>Niue </option>
                                                    <option value="Norfolk Island"><?=aren($lang1,"","")?>Norfolk Island </option>
                                                    <option value="Northern Mariana Islands"><?=aren($lang1,"","")?>Northern Mariana Islands </option>
                                                    <option value="Norway"><?=aren($lang1,"","")?>Norway </option>
                                                    <option value="Oman"><?=aren($lang1,"","")?>Oman </option>
                                                    <option value="Pakistan"><?=aren($lang1,"","")?>Pakistan </option>
                                                    <option value="Palau"><?=aren($lang1,"","")?>Palau </option>
                                                    <option value="Panama"><?=aren($lang1,"","")?>Panama </option>
                                                    <option value="Papua New Guinea"><?=aren($lang1,"","")?>Papua New Guinea </option>
                                                    <option value="Paraguay"><?=aren($lang1,"","")?>Paraguay </option>
                                                    <option value="Peru"><?=aren($lang1,"","")?>Peru </option>
                                                    <option value="Philippines"><?=aren($lang1,"","")?>Philippines </option>
                                                    <option value="Pitcairn"><?=aren($lang1,"","")?>Pitcairn </option>
                                                    <option value="Poland"><?=aren($lang1,"","")?>Poland </option>
                                                    <option value="Portugal"><?=aren($lang1,"","")?>Portugal </option>
                                                    <option value="Puerto Rico"><?=aren($lang1,"","")?>Puerto Rico </option>
                                                    <option value="Qatar"><?=aren($lang1,"","")?>Qatar </option>
                                                    <option value="Reunion"><?=aren($lang1,"","")?>Reunion </option>
                                                    <option value="Romania"><?=aren($lang1,"","")?>Romania </option>
                                                    <option value="Russian Federation"><?=aren($lang1,"","")?>Russian Federation </option>
                                                    <option value="Rwanda"><?=aren($lang1,"","")?>Rwanda </option>
                                                    <option value="Saint Kitts And Nevis"><?=aren($lang1,"","")?>Saint Kitts And Nevis </option>
                                                    <option value="Saint Lucia"><?=aren($lang1,"","")?>Saint Lucia </option>
                                                    <option value="Saint Vincent And The Grenadines"><?=aren($lang1,"","")?>Saint Vincent And The Grenadines </option>
                                                    <option value="Samoa"><?=aren($lang1,"","")?>Samoa </option>
                                                    <option value="San Marino"><?=aren($lang1,"","")?>San Marino </option>
                                                    <option value="Sao Tome And Principe"><?=aren($lang1,"","")?>Sao Tome And Principe </option>
                                                    <option value="Saudi Arabia"><?=aren($lang1,"","")?>Saudi Arabia </option>
                                                    <option value="Senegal"><?=aren($lang1,"","")?>Senegal </option>
                                                    <option value="Seychelles"><?=aren($lang1,"","")?>Seychelles </option>
                                                    <option value="Sierra Leone"><?=aren($lang1,"","")?>Sierra Leone </option>
                                                    <option value="Singapore"><?=aren($lang1,"","")?>Singapore </option>
                                                    <option value="Slovakia"><?=aren($lang1,"","")?>Slovakia </option>
                                                    <option value="Slovenia"><?=aren($lang1,"","")?>Slovenia </option>
                                                    <option value="Solomon Islands "><?=aren($lang1,"","")?>Solomon Islands </option>
                                                    <option value="Somalia"><?=aren($lang1,"","")?>Somalia </option>
                                                    <option value="South Africa"><?=aren($lang1,"","")?>South Africa </option>
                                                    <option value="South Georgia And The South Sandwich Islands"><?=aren($lang1,"","")?>South Georgia And The South Sandwich Islands </option>
                                                    <option value="Spain"><?=aren($lang1,"","")?>Spain </option>
                                                    <option value="Sri Lanka"><?=aren($lang1,"","")?>Sri Lanka </option>
                                                    <option value="St Helena"><?=aren($lang1,"","")?>St Helena </option>
                                                    <option value="St Pierre and Miquelon"><?=aren($lang1,"","")?>St Pierre and Miquelon </option>
                                                    <option value="Sudan"><?=aren($lang1,"","")?>Sudan </option>
                                                    <option value="Suriname"><?=aren($lang1,"","")?>Suriname </option>
                                                    <option value="Svalbard And Jan Mayen Islands"><?=aren($lang1,"","")?>Svalbard And Jan Mayen Islands </option>


                                                    <option value="Swaziland"><?=aren($lang1,"","")?>Swaziland </option>
                                                    <option value="Sweden"><?=aren($lang1,"","")?>Sweden </option>
                                                    <option value="Switzerland"><?=aren($lang1,"","")?>Switzerland </option>
                                                    <option value="Syrian Arab Republic"><?=aren($lang1,"","")?>Syrian Arab Republic </option>
                                                    <option value="Taiwan"><?=aren($lang1,"","")?>Taiwan </option>
                                                    <option value="Tajikistan"><?=aren($lang1,"","")?>Tajikistan </option>
                                                    <option value="Tanzania"><?=aren($lang1,"","")?>Tanzania </option>
                                                    <option value="Thailand"><?=aren($lang1,"","")?>Thailand </option>
                                                    <option value="Togo"><?=aren($lang1,"","")?>Togo </option>
                                                    <option value="Tokelau"><?=aren($lang1,"","")?>Tokelau </option>
                                                    <option value="Tonga"><?=aren($lang1,"","")?>Tonga </option>
                                                    <option value="Trinidad And Tobago"><?=aren($lang1,"","")?>Trinidad And Tobago </option>
                                                    <option value="Tunisia"><?=aren($lang1,"","")?>Tunisia </option>
                                                    <option value="Turkey"><?=aren($lang1,"","")?>Turkey </option>
                                                    <option value="Turkmenistan"><?=aren($lang1,"","")?>Turkmenistan </option>
                                                    <option value="Turks And Caicos Islands"><?=aren($lang1,"","")?>Turks And Caicos Islands </option>
                                                    <option value="Tuvalu"><?=aren($lang1,"","")?>Tuvalu </option>
                                                    <option value="Uganda"><?=aren($lang1,"","")?>Uganda </option>
                                                    <option value="Ukraine"><?=aren($lang1,"","")?>Ukraine </option>
                                                    <option value="United Arab Emirates"><?=aren($lang1,"","")?>United Arab Emirates </option>
                                                    <option value="United Kingdom"><?=aren($lang1,"","")?>United Kingdom </option>
                                                    <option value="United States"><?=aren($lang1,"","")?>United States </option>
                                                    <option value="Uruguay"><?=aren($lang1,"","")?>Uruguay </option>
                                                    <option value="Uzbekistan"><?=aren($lang1,"","")?>Uzbekistan </option>
                                                    <option value="Vanuatu"><?=aren($lang1,"","")?>Vanuatu </option>
                                                    <option value="Vatican City State"><?=aren($lang1,"","")?>Vatican City State </option>
                                                    <option value="Venezuela"><?=aren($lang1,"","")?>Venezuela </option>
                                                    <option value="Viet Nam"><?=aren($lang1,"","")?>Viet Nam </option>
                                                    <option value="Virgin Islands (British)"><?=aren($lang1,"","")?>Virgin Islands (British) </option>
                                                    <option value="Virgin Islands (U.S.)"><?=aren($lang1,"","")?>Virgin Islands (U.S.) </option>
                                                    <option value="Wallis And Futuna Islands"><?=aren($lang1,"","")?>Wallis And Futuna Islands </option>
                                                    <option value="Western Sahara"><?=aren($lang1,"","")?>Western Sahara </option>
                                                    <option value="Yemen"><?=aren($lang1,"","")?>Yemen </option>
                                                    <option value="Zaire"><?=aren($lang1,"","")?>Zaire </option>
                                                    <option value="Zambia"><?=aren($lang1,"","")?>Zambia </option>
                                                    <option value="Zimbabwe"><?=aren($lang1,"","")?>Zimbabwe </option>
                                                    <option value="Other Not Shown"><?=aren($lang1,"","")?>Other Not Shown</option>
                                                </select>
                                            </strong></td>
                                    </tr>

                                    <tr>
                                        <td height="10" align="" nowrap="nowrap"></td>
                                        <td align=""></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="" nowrap="nowrap"><div class="title_main">
                                                <div><strong>			  		<?=aren($lang,"ÇáåÇÊÝ * :"," Phone *:") ?> 	 			  		  </strong></div>
                                            </div></td>
                                        <td align=""></td>
                                    </tr>
                                    <tr>
                                        <td height="25" colspan="2" align="" nowrap="nowrap"><table border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td><input style="width: 70px;" id="code" size="10" name="code" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>
                                                    <td><input style="width: 153px;" id="phone" size="35" name="phone" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>
                                                </tr>
                                                <tr>
                                                    <td>			<?=aren($lang,"ÑãÒ ÇáÈáÏ","Country Code") ?>
                                                    </td><td>&nbsp;		<?=aren($lang,"ÑÞã ÇáåÇÊÝ","  Phone Number	") ?> 	  			 		  </td>
                                                </tr>
                                                </tbody></table></td>
                                    </tr>
                                    <tr>
                                        <td height="10" colspan="2" align="" nowrap="nowrap"></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="" nowrap="nowrap"><div class="title_main">
                                                <div><strong>             <?=aren($lang,"ÇáÈÑíÏ ÇáÇáßÊÑæäí * :","Email   *:") ?>                </strong></div>
                                            </div></td>
                                        <td align=""><div></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="" nowrap="nowrap"><input style="width: 240px;" id="mail2" size="50" name="email" type="email" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="" nowrap="nowrap"><strong>

                                            </strong></td>
                                        <td align="">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="10" align="" nowrap="nowrap"></td>
                                        <td align=""></td>
                                    </tr>
                                    <tr>
                                        <td align="" nowrap="nowrap"><div><strong>
                                                <?if($mode=="contactus"){?>
                                                    <?=aren($lang,"ÇÓÊÝÓÇÑ Ãæ ÊÚáíÞ","Inquiry or Comment* ") ?> :
                                                <?}else{?>
                                                    <?=aren($lang,"ÇÑÝÇÞ ãáÝ","Attachment *") ?> :
                                                <?}?>
                                                </strong>
                                            </div>
                                        </td>
                                        <td align=""><div></div></td>
                                    </tr>
                                    <tr>
                                        <td height="43" colspan="2" align="" nowrap="nowrap">

                                            <?if($mode=="contactus"){ ?>
                                            <textarea style="width: 327px;" name="msg" cols="50" rows="6" id="msg"></textarea>
                                            <?}else{?>
                                                <input style="width: 240px;" id="file" size="50" name="file" type="file" value="b">
                                            <?}?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="43" colspan="2" align="" nowrap="nowrap"><strong>
                                                <div class="form_results" id="contact_results"></div>
                                                <br>



                                                <input  onclick="validatecontactusform()" class="Btn Btn_swipe-top Btn_swipe-black" style="background-color:#BC9B6A; width:160px;height:50px"  id="submit_btnc" type="button" value="<?=aren($lang,"ÇÑÓÇá","Send")?>">

                                                <br>
                                                <br>      <?=aren($lang,"ÇáÍÞæá ÇáãØáæÈÉ * ","*Required Fields ") ?>         </strong></td>
                                    </tr>

                                    </tbody></table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>  </div>



    </form></div>
</div>
<script>
    function reportError(name,error)
    {
        alert(name+" : "+error);
    }
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    function validatecontactusform()
    {


        var fname = document.getElementById("contactusform").fname;
        var lname = document.getElementById("contactusform").lname;


        var phone = document.getElementById("contactusform").phone;
        var code = document.getElementById("contactusform").code;

        var mail2 = document.getElementById("contactusform").mail2;
        //Console.log("1");


        if(fname.value=="") {reportError("<?=aren($lang,"ÇáÇÓã ÇáÇæá","first name")?>","<?=aren($lang,"áÇ íãßä Çä Êßæä ÇáÞíãÉ ÝÇÑÞÉ","Can not be empty")?>");return;}
        if(lname.value=="") {reportError("<?=aren($lang,"ÇáÇÓã ÇáËÇäí","last name")?>","<?=aren($lang,"áÇ íãßä Çä Êßæä ÇáÞíãÉ ÝÇÑÞÉ","Can not be empty")?>");return;}
        if(code.value=="") {reportError("<?=aren($lang,"ÑãÒ ÇáÈáÏ","code")?>","<?=aren($lang,"áÇ íãßä Çä Êßæä ÇáÞíãÉ ÝÇÑÞÉ","Can not be empty")?>");return;}
        if(phone.value=="") {reportError("<?=aren($lang,"ÇáåÇÊÝ","phone")?>","<?=aren($lang,"áÇ íãßä Çä Êßæä ÇáÞíãÉ ÝÇÑÞÉ","Can not be empty")?>");return;}
        if(mail2.value=="") {reportError("<?=aren($lang,"ÇáÈÑíÏ ÇáÇáßÊÑæäí","Email")?>","<?=aren($lang,"áÇ íãßä Çä Êßæä ÇáÞíãÉ ÝÇÑÞÉ","Can not be empty")?>");return;}

        <?if($mode=="contactus"){ ?>
        var msg = document.getElementById("contactusform").msg;
        if(msg.value=="") {reportError("<?=aren($lang," Ãæ ÇáÊÚáíÞ ÇáÇÓÊÝÓÇÑ","Message")?>","<?=aren($lang,"áÇ íãßä Çä Êßæä ÇáÞíãÉ ÝÇÑÞÉ","Can not be empty")?>");return;}

        <?}else{?>
        if(document.getElementById("file").value == ''){reportError("<?=aren($lang,"ÇáãáÝ ÇáãÑÝÞ","attachment")?>","<?=aren($lang,"áÇ íæÌÏ ãáÝ","no attachment")?>");return;}
        <?}?>
        if(!validateEmail(mail2.value)){reportError("<?=aren($lang,"ÇáÈÑíÏ ÇáÇáßÊÑæäí","Email")?>","<?=aren($lang,"Çíãíá ÎÇØÆ","wrong mail")?>");return;}
        document.getElementById("contactusform").submit();
    }


</script>
