<!-- country codes (ISO 3166) and Dial codes. -->

@php 
	
	$client = Auth::guard('client')->user(); 

@endphp 

<select name="cc_country_code" class="form-control">
		
		<option  value="44" {!!  $client->accountInformation->cc_country_code == '44' ? 'selected' : '' !!} >UK (+44)</option>
		<option  value="1" {!!  $client->accountInformation->cc_country_code == '1' ? 'selected' : '' !!}>USA (+1)</option>
		<option  value="213" {!!  $client->accountInformation->cc_country_code == '213' ? 'selected' : '' !!}>Algeria (+213)</option>
		<option  value="376" {!!  $client->accountInformation->cc_country_code == '376' ? 'selected' : '' !!}>Andorra (+376)</option>
		<option  value="244" {!!  $client->accountInformation->cc_country_code == '244' ? 'selected' : '' !!}>Angola (+244)</option>
		<option  value="1264" {!!  $client->accountInformation->cc_country_code == '1264' ? 'selected' : '' !!}>Anguilla (+1264)</option>
		<option  value="1268" {!!  $client->accountInformation->cc_country_code == '1268' ? 'selected' : '' !!}>Antigua &amp; Barbuda (+1268)</option>
		<option  value="54" {!!  $client->accountInformation->cc_country_code == '54' ? 'selected' : '' !!}>Argentina (+54)</option>
		<option  value="374" {!!  $client->accountInformation->cc_country_code == '374' ? 'selected' : '' !!}>Armenia (+374)</option>
		<option  value="297" {!!  $client->accountInformation->cc_country_code == '297' ? 'selected' : '' !!}>Aruba (+297)</option>
		<option  value="61" {!!  $client->accountInformation->cc_country_code == '61' ? 'selected' : '' !!}>Australia (+61)</option>
		<option  value="43" {!!  $client->accountInformation->cc_country_code == '43' ? 'selected' : '' !!}>Austria (+43)</option>
		<option  value="994" {!!  $client->accountInformation->cc_country_code == '994' ? 'selected' : '' !!}>Azerbaijan (+994)</option>
		<option  value="1242" {!!  $client->accountInformation->cc_country_code == '1242' ? 'selected' : '' !!}>Bahamas (+1242)</option>
		<option  value="973" {!!  $client->accountInformation->cc_country_code == '973' ? 'selected' : '' !!} >Bahrain (+973)</option>
		<option  value="880" {!!  $client->accountInformation->cc_country_code == '880' ? 'selected' : '' !!}>Bangladesh (+880)</option>
		<option  value="1246" {!!  $client->accountInformation->cc_country_code == '1246' ? 'selected' : '' !!}>Barbados (+1246)</option>
		<option  value="375" {!!  $client->accountInformation->cc_country_code == '375' ? 'selected' : '' !!}>Belarus (+375)</option>
		<option  value="32" {!!  $client->accountInformation->cc_country_code == '32' ? 'selected' : '' !!}>Belgium (+32)</option>
		<option  value="501" {!!  $client->accountInformation->cc_country_code == '501' ? 'selected' : '' !!}>Belize (+501)</option>
		<option  value="229" {!!  $client->accountInformation->cc_country_code == '229' ? 'selected' : '' !!}>Benin (+229)</option>
		<option  value="1441" {!!  $client->accountInformation->cc_country_code == '1441' ? 'selected' : '' !!}>Bermuda (+1441)</option>
		<option  value="975" {!!  $client->accountInformation->cc_country_code == '975' ? 'selected' : '' !!}>Bhutan (+975)</option>
		<option  value="591" {!!  $client->accountInformation->cc_country_code == '591' ? 'selected' : '' !!}>Bolivia (+591)</option>
		<option  value="387" {!!  $client->accountInformation->cc_country_code == '387' ? 'selected' : '' !!}>Bosnia Herzegovina (+387)</option>
		<option  value="267" {!!  $client->accountInformation->cc_country_code == '267' ? 'selected' : '' !!}>Botswana (+267)</option>
		<option  value="55" {!!  $client->accountInformation->cc_country_code == '55' ? 'selected' : '' !!}>Brazil (+55)</option>
		<option  value="673" {!!  $client->accountInformation->cc_country_code == '673' ? 'selected' : '' !!}>Brunei (+673)</option>
		<option  value="359" {!!  $client->accountInformation->cc_country_code == '359' ? 'selected' : '' !!}>Bulgaria (+359)</option>
		<option  value="226" {!!  $client->accountInformation->cc_country_code == '226' ? 'selected' : '' !!}>Burkina Faso (+226)</option>
		<option  value="257" {!!  $client->accountInformation->cc_country_code == '257' ? 'selected' : '' !!}>Burundi (+257)</option>
		<option  value="855" {!!  $client->accountInformation->cc_country_code == '855' ? 'selected' : '' !!}>Cambodia (+855)</option>
		<option  value="237" {!!  $client->accountInformation->cc_country_code == '237' ? 'selected' : '' !!}>Cameroon (+237)</option>
		<option  value="1" {!!  $client->accountInformation->cc_country_code == '1' ? 'selected' : '' !!}>Canada (+1)</option>
		<option  value="238" {!!  $client->accountInformation->cc_country_code == '238' ? 'selected' : '' !!}>Cape Verde Islands (+238)</option>
		<option  value="1345" {!!  $client->accountInformation->cc_country_code == '1345' ? 'selected' : '' !!}>Cayman Islands (+1345)</option>
		<option  value="236" {!!  $client->accountInformation->cc_country_code == '236' ? 'selected' : '' !!}>Central African Republic (+236)</option>
		<option  value="56" {!!  $client->accountInformation->cc_country_code == '56' ? 'selected' : '' !!}>Chile (+56)</option>
		<option  value="86" {!!  $client->accountInformation->cc_country_code == '86' ? 'selected' : '' !!}>China (+86)</option>
		<option  value="57" {!!  $client->accountInformation->cc_country_code == '57' ? 'selected' : '' !!}>Colombia (+57)</option>
		<option  value="269" {!!  $client->accountInformation->cc_country_code == '269' ? 'selected' : '' !!}>Comoros (+269)</option>
		<option  value="242" {!!  $client->accountInformation->cc_country_code == '242' ? 'selected' : '' !!}>Congo (+242)</option>
		<option  value="682" {!!  $client->accountInformation->cc_country_code == '682' ? 'selected' : '' !!}>Cook Islands (+682)</option>
		<option  value="506" {!!  $client->accountInformation->cc_country_code == '506' ? 'selected' : '' !!}>Costa Rica (+506)</option>
		<option  value="385" {!!  $client->accountInformation->cc_country_code == '385' ? 'selected' : '' !!}>Croatia (+385)</option>
		<option  value="53" {!!  $client->accountInformation->cc_country_code == '53' ? 'selected' : '' !!}>Cuba (+53)</option>
		<option  value="90392" {!!  $client->accountInformation->cc_country_code == '90392' ? 'selected' : '' !!}>Cyprus North (+90392)</option>
		<option  value="357" {!!  $client->accountInformation->cc_country_code == '357' ? 'selected' : '' !!}>Cyprus South (+357)</option>
		<option  value="42" {!!  $client->accountInformation->cc_country_code == '42' ? 'selected' : '' !!}>Czech Republic (+42)</option>
		<option  value="45" {!!  $client->accountInformation->cc_country_code == '45' ? 'selected' : '' !!}>Denmark (+45)</option>
		<option  value="253" {!!  $client->accountInformation->cc_country_code == '253' ? 'selected' : '' !!}>Djibouti (+253)</option>
		<option  value="1809" {!!  $client->accountInformation->cc_country_code == '1809' ? 'selected' : '' !!}>Dominica (+1809)</option>
		<option  value="1809"{!!  $client->accountInformation->cc_country_code == '1809' ? 'selected' : '' !!}>Dominican Republic (+1809)</option>
		<option  value="593" {!!  $client->accountInformation->cc_country_code == '593' ? 'selected' : '' !!}>Ecuador (+593)</option>
		<option  value="20" {!!  $client->accountInformation->cc_country_code == '20' ? 'selected' : '' !!}>Egypt (+20)</option>
		<option  value="503" {!!  $client->accountInformation->cc_country_code == '503' ? 'selected' : '' !!} >El Salvador (+503)</option>
		<option  value="240" {!!  $client->accountInformation->cc_country_code == '240' ? 'selected' : '' !!}>Equatorial Guinea (+240)</option>
		<option  value="291" {!!  $client->accountInformation->cc_country_code == '291' ? 'selected' : '' !!}>Eritrea (+291)</option>
		<option  value="372" {!!  $client->accountInformation->cc_country_code == '372' ? 'selected' : '' !!}>Estonia (+372)</option>
		<option  value="251" {!!  $client->accountInformation->cc_country_code == '251' ? 'selected' : '' !!} > Ethiopia (+251)</option>
		<option  value="500" {!!  $client->accountInformation->cc_country_code == '500' ? 'selected' : '' !!}>Falkland Islands (+500)</option>
		<option  value="298" {!!  $client->accountInformation->cc_country_code == '298' ? 'selected' : '' !!}>Faroe Islands (+298)</option>
		<option  value="679" {!!  $client->accountInformation->cc_country_code == '679' ? 'selected' : '' !!}>Fiji (+679)</option>
		<option  value="358" {!!  $client->accountInformation->cc_country_code == '358' ? 'selected' : '' !!}>Finland (+358)</option>
		<option  value="33" {!!  $client->accountInformation->cc_country_code == '33' ? 'selected' : '' !!}>France (+33)</option>
		<option  value="594" {!!  $client->accountInformation->cc_country_code == '594' ? 'selected' : '' !!}>French Guiana (+594)</option>
		<option  value="689" {!!  $client->accountInformation->cc_country_code == '689' ? 'selected' : '' !!}>French Polynesia (+689)</option>
		<option  value="241" {!!  $client->accountInformation->cc_country_code == '241' ? 'selected' : '' !!}>Gabon (+241)</option>
		<option  value="220" {!!  $client->accountInformation->cc_country_code == '220' ? 'selected' : '' !!}>Gambia (+220)</option>
		<option  value="7880" {!!  $client->accountInformation->cc_country_code == '7880' ? 'selected' : '' !!}>Georgia (+7880)</option>
		<option  value="49" {!!  $client->accountInformation->cc_country_code == '49' ? 'selected' : '' !!}>Germany (+49)</option>
		<option  value="233" {!!  $client->accountInformation->cc_country_code == '233' ? 'selected' : '' !!}>Ghana (+233)</option>
		<option  value="350" {!!  $client->accountInformation->cc_country_code == '350' ? 'selected' : '' !!}>Gibraltar (+350)</option>
		<option  value="30" {!!  $client->accountInformation->cc_country_code == '30' ? 'selected' : '' !!}>Greece (+30)</option>
		<option  value="299" {!!  $client->accountInformation->cc_country_code == '299' ? 'selected' : '' !!}>Greenland (+299)</option>
		<option  value="1473" {!!  $client->accountInformation->cc_country_code == '1473' ? 'selected' : '' !!}>Grenada (+1473)</option>
		<option  value="590" {!!  $client->accountInformation->cc_country_code == '590' ? 'selected' : '' !!}>Guadeloupe (+590)</option>
		<option  value="671" {!!  $client->accountInformation->cc_country_code == '671' ? 'selected' : '' !!}>Guam (+671)</option>
		<option  value="502" {!!  $client->accountInformation->cc_country_code == '502' ? 'selected' : '' !!}>Guatemala (+502)</option>
		<option  value="224" {!!  $client->accountInformation->cc_country_code == '224' ? 'selected' : '' !!}>Guinea (+224)</option>
		<option  value="245" {!!  $client->accountInformation->cc_country_code == '245' ? 'selected' : '' !!}>Guinea - Bissau (+245)</option>
		<option  value="592" {!!  $client->accountInformation->cc_country_code == '592' ? 'selected' : '' !!}>Guyana (+592)</option>
		<option  value="509" {!!  $client->accountInformation->cc_country_code == '509' ? 'selected' : '' !!}>Haiti (+509)</option>
		<option  value="504" {!!  $client->accountInformation->cc_country_code == '504' ? 'selected' : '' !!}>Honduras (+504)</option>
		<option  value="852" {!!  $client->accountInformation->cc_country_code == '852' ? 'selected' : '' !!}>Hong Kong (+852)</option>
		<option  value="36" {!!  $client->accountInformation->cc_country_code == '36' ? 'selected' : '' !!}>Hungary (+36)</option>
		<option  value="354" {!!  $client->accountInformation->cc_country_code == '354' ? 'selected' : '' !!}>Iceland (+354)</option>
		<option  value="91" {!!  $client->accountInformation->cc_country_code == '91' ? 'selected' : '' !!}>India (+91)</option>
		<option  value="62" {!!  $client->accountInformation->cc_country_code == '62' ? 'selected' : '' !!}>Indonesia (+62)</option>
		<option  value="98" {!!  $client->accountInformation->cc_country_code == '98' ? 'selected' : '' !!}>Iran (+98)</option>
		<option  value="964" {!!  $client->accountInformation->cc_country_code == '964' ? 'selected' : '' !!}>Iraq (+964)</option>
		<option  value="353" {!!  $client->accountInformation->cc_country_code == '353' ? 'selected' : '' !!}>Ireland (+353)</option>
		<option  value="972" {!!  $client->accountInformation->cc_country_code == '972' ? 'selected' : '' !!}>Israel (+972)</option>
		<option  value="39"  {!!  $client->accountInformation->cc_country_code == '39' ? 'selected' : '' !!}>Italy (+39)</option>
		<option  value="1876" {!!  $client->accountInformation->cc_country_code == '1876' ? 'selected' : '' !!}>Jamaica (+1876)</option>
		<option  value="81"  {!!  $client->accountInformation->cc_country_code == '81' ? 'selected' : '' !!}>Japan (+81)</option>
		<option  value="962" {!!  $client->accountInformation->cc_country_code == '962' ? 'selected' : '' !!}>Jordan (+962)</option>
		<option  value="7"   {!!  $client->accountInformation->cc_country_code == '7' ? 'selected' : '' !!}>Kazakhstan (+7)</option>
		<option  value="254" {!!  $client->accountInformation->cc_country_code == '254' ? 'selected' : '' !!}>Kenya (+254)</option>
		<option  value="686" {!!  $client->accountInformation->cc_country_code == '686' ? 'selected' : '' !!}>Kiribati (+686)</option>
		<option  value="850" {!!  $client->accountInformation->cc_country_code == '850' ? 'selected' : '' !!}>Korea North (+850)</option>
		<option  value="82"  {!!  $client->accountInformation->cc_country_code == '82' ? 'selected' : '' !!}>Korea South (+82)</option>
		<option  value="965" {!!  $client->accountInformation->cc_country_code == '965' ? 'selected' : '' !!}>Kuwait (+965)</option>
		<option  value="996" {!!  $client->accountInformation->cc_country_code == '996' ? 'selected' : '' !!}>Kyrgyzstan (+996)</option>
		<option  value="856" {!!  $client->accountInformation->cc_country_code == '856' ? 'selected' : '' !!}>Laos (+856)</option>
		<option  value="371" {!!  $client->accountInformation->cc_country_code == '371' ? 'selected' : '' !!}>Latvia (+371)</option>
		<option  value="961" {!!  $client->accountInformation->cc_country_code == '961' ? 'selected' : '' !!}>Lebanon (+961)</option>
		<option  value="266" {!!  $client->accountInformation->cc_country_code == '266' ? 'selected' : '' !!}>Lesotho (+266)</option>
		<option  value="231" {!!  $client->accountInformation->cc_country_code == '231' ? 'selected' : '' !!}>Liberia (+231)</option>
		<option  value="218" {!!  $client->accountInformation->cc_country_code == '218' ? 'selected' : '' !!}>Libya (+218)</option>
		<option  value="417" {!!  $client->accountInformation->cc_country_code == '417' ? 'selected' : '' !!}>Liechtenstein (+417)</option>
		<option  value="370" {!!  $client->accountInformation->cc_country_code == '370' ? 'selected' : '' !!}>Lithuania (+370)</option>
		<option  value="352" {!!  $client->accountInformation->cc_country_code == '352' ? 'selected' : '' !!}>Luxembourg (+352)</option>
		<option  value="853" {!!  $client->accountInformation->cc_country_code == '853' ? 'selected' : '' !!}>Macao (+853)</option>
		<option  value="389" {!!  $client->accountInformation->cc_country_code == '389' ? 'selected' : '' !!}>Macedonia (+389)</option>
		<option  value="261" {!!  $client->accountInformation->cc_country_code == '261' ? 'selected' : '' !!}>Madagascar (+261)</option>
		<option  value="265" {!!  $client->accountInformation->cc_country_code == '265' ? 'selected' : '' !!}>Malawi (+265)</option>
		<option  value="60" {!!  $client->accountInformation->cc_country_code == '60' ? 'selected' : '' !!}>Malaysia (+60)</option>
		<option  value="960" {!!  $client->accountInformation->cc_country_code == '960' ? 'selected' : '' !!}>Maldives (+960)</option>
		<option  value="223" {!!  $client->accountInformation->cc_country_code == '223' ? 'selected' : '' !!}>Mali (+223)</option>
		<option  value="356" {!!  $client->accountInformation->cc_country_code == '356' ? 'selected' : '' !!}>Malta (+356)</option>
		<option  value="692" {!!  $client->accountInformation->cc_country_code == '692' ? 'selected' : '' !!}>Marshall Islands (+692)</option>
		<option  value="596" {!!  $client->accountInformation->cc_country_code == '596' ? 'selected' : '' !!}>Martinique (+596)</option>
		<option  value="222" {!!  $client->accountInformation->cc_country_code == '222' ? 'selected' : '' !!}>Mauritania (+222)</option>
		<option  value="269" {!!  $client->accountInformation->cc_country_code == '269' ? 'selected' : '' !!}>Mayotte (+269)</option>
		<option  value="52" {!!  $client->accountInformation->cc_country_code == '52' ? 'selected' : '' !!}>Mexico (+52)</option>
		<option  value="691" {!!  $client->accountInformation->cc_country_code == '691' ? 'selected' : '' !!}>Micronesia (+691)</option>
		<option  value="373" {!!  $client->accountInformation->cc_country_code == '373' ? 'selected' : '' !!}>Moldova (+373)</option>
		<option  value="377" {!!  $client->accountInformation->cc_country_code == '377' ? 'selected' : '' !!}>Monaco (+377)</option>
		<option  value="976" {!!  $client->accountInformation->cc_country_code == '976' ? 'selected' : '' !!}>Mongolia (+976)</option>
		<option  value="1664" {!!  $client->accountInformation->cc_country_code == '1664' ? 'selected' : '' !!}>Montserrat (+1664)</option>
		<option  value="212" {!!  $client->accountInformation->cc_country_code == '212' ? 'selected' : '' !!}>Morocco (+212)</option>
		<option  value="258" {!!  $client->accountInformation->cc_country_code == '258' ? 'selected' : '' !!}>Mozambique (+258)</option>
		<option  value="95" {!!  $client->accountInformation->cc_country_code == '95' ? 'selected' : '' !!}>Myanmar (+95)</option>
		<option  value="264" {!!  $client->accountInformation->cc_country_code == '264' ? 'selected' : '' !!}>Namibia (+264)</option>
		<option  value="674" {!!  $client->accountInformation->cc_country_code == '674' ? 'selected' : '' !!}>Nauru (+674)</option>
		<option  value="977" {!!  $client->accountInformation->cc_country_code == '977' ? 'selected' : '' !!}>Nepal (+977)</option>
		<option  value="31" {!!  $client->accountInformation->cc_country_code == '31' ? 'selected' : '' !!}>Netherlands (+31)</option>
		<option  value="687" {!!  $client->accountInformation->cc_country_code == '687' ? 'selected' : '' !!}>New Caledonia (+687)</option>
		<option  value="64" {!!  $client->accountInformation->cc_country_code == '64' ? 'selected' : '' !!}>New Zealand (+64)</option>
		<option  value="505" {!!  $client->accountInformation->cc_country_code == '505' ? 'selected' : '' !!}>Nicaragua (+505)</option>
		<option  value="227" {!!  $client->accountInformation->cc_country_code == '227' ? 'selected' : '' !!}>Niger (+227)</option>
		<option  value="234" {!!  $client->accountInformation->cc_country_code == '234' ? 'selected' : '' !!}>Nigeria (+234)</option>
		<option  value="683" {!!  $client->accountInformation->cc_country_code == '683' ? 'selected' : '' !!}>Niue (+683)</option>
		<option  value="672" {!!  $client->accountInformation->cc_country_code == '672' ? 'selected' : '' !!}>Norfolk Islands (+672)</option>
		<option  value="670" {!!  $client->accountInformation->cc_country_code == '670' ? 'selected' : '' !!}>Northern Marianas (+670)</option>
		<option  value="47" {!!  $client->accountInformation->cc_country_code == '47' ? 'selected' : '' !!}>Norway (+47)</option>
		<option  value="968" {!!  $client->accountInformation->cc_country_code == '968' ? 'selected' : '' !!}>Oman (+968)</option>
		<option  value="680" {!!  $client->accountInformation->cc_country_code == '680' ? 'selected' : '' !!}>Palau (+680)</option>
		<option  value="507" {!!  $client->accountInformation->cc_country_code == '507' ? 'selected' : '' !!}>Panama (+507)</option>
		<option  value="675" {!!  $client->accountInformation->cc_country_code == '675' ? 'selected' : '' !!}>Papua New Guinea (+675)</option>
		<option  value="595" {!!  $client->accountInformation->cc_country_code == '595' ? 'selected' : '' !!}>Paraguay (+595)</option>
		<option  value="51" {!!  $client->accountInformation->cc_country_code == '51' ? 'selected' : '' !!}>Peru (+51)</option>
		<option  value="63" {!!  $client->accountInformation->cc_country_code == '63' ? 'selected' : '' !!}>Philippines (+63)</option>
		<option  value="48" {!!  $client->accountInformation->cc_country_code == '48' ? 'selected' : '' !!}>Poland (+48)</option>
		<option  value="351" {!!  $client->accountInformation->cc_country_code == '351' ? 'selected' : '' !!} >Portugal (+351)</option>
		<option  value="1787" {!!  $client->accountInformation->cc_country_code == '1787' ? 'selected' : '' !!}>Puerto Rico (+1787)</option>
		<option  value="974" {!!  $client->accountInformation->cc_country_code == '974' ? 'selected' : '' !!}>Qatar (+974)</option>
		<option  value="262" {!!  $client->accountInformation->cc_country_code == '262' ? 'selected' : '' !!}>Reunion (+262)</option>
		<option  value="40" {!!  $client->accountInformation->cc_country_code == '40' ? 'selected' : '' !!}>Romania (+40)</option>
		<option  value="7" {!!  $client->accountInformation->cc_country_code == '7' ? 'selected' : '' !!}>Russia (+7)</option>
		<option  value="250" {!!  $client->accountInformation->cc_country_code == '250' ? 'selected' : '' !!}>Rwanda (+250)</option>
		<option  value="378" {!!  $client->accountInformation->cc_country_code == '378' ? 'selected' : '' !!}>San Marino (+378)</option>
		<option  value="239" {!!  $client->accountInformation->cc_country_code == '239' ? 'selected' : '' !!}>Sao Tome &amp; Principe (+239)</option>
		<option  value="966" {!!  $client->accountInformation->cc_country_code == '966' ? 'selected' : '' !!}>Saudi Arabia (+966)</option>
		<option  value="221" {!!  $client->accountInformation->cc_country_code == '221' ? 'selected' : '' !!}>Senegal (+221)</option>
		<option  value="381" {!!  $client->accountInformation->cc_country_code == '381' ? 'selected' : '' !!}>Serbia (+381)</option>
		<option  value="248" {!!  $client->accountInformation->cc_country_code == '248' ? 'selected' : '' !!}>Seychelles (+248)</option>
		<option  value="232" {!!  $client->accountInformation->cc_country_code == '232' ? 'selected' : '' !!}>Sierra Leone (+232)</option>
		<option  value="65" {!!  $client->accountInformation->cc_country_code == '65' ? 'selected' : '' !!}>Singapore (+65)</option>
		<option  value="421" {!!  $client->accountInformation->cc_country_code == '421' ? 'selected' : '' !!}>Slovak Republic (+421)</option>
		<option  value="386" {!!  $client->accountInformation->cc_country_code == '386' ? 'selected' : '' !!}>Slovenia (+386)</option>
		<option  value="677" {!!  $client->accountInformation->cc_country_code == '677' ? 'selected' : '' !!}>Solomon Islands (+677)</option>
		<option  value="252" {!!  $client->accountInformation->cc_country_code == '252' ? 'selected' : '' !!}>Somalia (+252)</option>
		<option  value="27" {!!  $client->accountInformation->cc_country_code == '27' ? 'selected' : '' !!}>South Africa (+27)</option>
		<option  value="34" {!!  $client->accountInformation->cc_country_code == '34' ? 'selected' : '' !!}>Spain (+34)</option>
		<option  value="94" {!!  $client->accountInformation->cc_country_code == '94' ? 'selected' : '' !!}>Sri Lanka (+94)</option>
		<option  value="290" {!!  $client->accountInformation->cc_country_code == '290' ? 'selected' : '' !!}>St. Helena (+290)</option>
		<option  value="1869" {!!  $client->accountInformation->cc_country_code == '1869' ? 'selected' : '' !!}>St. Kitts (+1869)</option>
		<option  value="1758" {!!  $client->accountInformation->cc_country_code == '1758' ? 'selected' : '' !!}>St. Lucia (+1758)</option>
		<option  value="249" {!!  $client->accountInformation->cc_country_code == '249' ? 'selected' : '' !!}>Sudan (+249)</option>
		<option  value="597" {!!  $client->accountInformation->cc_country_code == '597' ? 'selected' : '' !!}>Suriname (+597)</option>
		<option  value="268" {!!  $client->accountInformation->cc_country_code == '268' ? 'selected' : '' !!}>Swaziland (+268)</option>
		<option  value="46" {!!  $client->accountInformation->cc_country_code == '46' ? 'selected' : '' !!}>Sweden (+46)</option>
		<option  value="41" {!!  $client->accountInformation->cc_country_code == '41' ? 'selected' : '' !!}>Switzerland (+41)</option>
		<option  value="963" {!!  $client->accountInformation->cc_country_code == '963' ? 'selected' : '' !!}>Syria (+963)</option>
		<option  value="886" {!!  $client->accountInformation->cc_country_code == '886' ? 'selected' : '' !!}>Taiwan (+886)</option>
		<option  value="7" {!!  $client->accountInformation->cc_country_code == '7' ? 'selected' : '' !!}>Tajikstan (+7)</option>
		<option  value="66" {!!  $client->accountInformation->cc_country_code == '66' ? 'selected' : '' !!}>Thailand (+66)</option>
		<option  value="228" {!!  $client->accountInformation->cc_country_code == '228' ? 'selected' : '' !!}>Togo (+228)</option>
		<option  value="676" {!!  $client->accountInformation->cc_country_code == '676' ? 'selected' : '' !!}>Tonga (+676)</option>
		<option  value="1868" {!!  $client->accountInformation->cc_country_code == '1868' ? 'selected' : '' !!}>Trinidad &amp; Tobago (+1868)</option>
		<option  value="216" {!!  $client->accountInformation->cc_country_code == '216' ? 'selected' : '' !!}>Tunisia (+216)</option>
		<option  value="90" {!!  $client->accountInformation->cc_country_code == '90' ? 'selected' : '' !!}>Turkey (+90)</option>
		<option  value="7" {!!  $client->accountInformation->cc_country_code == '7' ? 'selected' : '' !!}>Turkmenistan (+7)</option>
		<option  value="993" {!!  $client->accountInformation->cc_country_code == '993' ? 'selected' : '' !!}>Turkmenistan (+993)</option>
		<option  value="1649" {!!  $client->accountInformation->cc_country_code == '1649' ? 'selected' : '' !!}>Turks &amp; Caicos Islands (+1649)</option>
		<option  value="688" {!!  $client->accountInformation->cc_country_code == '688' ? 'selected' : '' !!}>Tuvalu (+688)</option>
		<option  value="256" {!!  $client->accountInformation->cc_country_code == '256' ? 'selected' : '' !!} >Uganda (+256)</option>
		<!-- <option  value="44">UK (+44)</option> -->
		<option  value="380" {!!  $client->accountInformation->cc_country_code == '380' ? 'selected' : '' !!}>Ukraine (+380)</option>
		<option  value="971" {!!  $client->accountInformation->cc_country_code == '971' ? 'selected' : '' !!}>United Arab Emirates (+971)</option>
		<option  value="598" {!!  $client->accountInformation->cc_country_code == '598' ? 'selected' : '' !!}>Uruguay (+598)</option>
		<!-- <option  value="1">USA (+1)</option> -->
		<option  value="7" {!!  $client->accountInformation->cc_country_code == '7' ? 'selected' : '' !!}>Uzbekistan (+7)</option>
		<option  value="678" {!!  $client->accountInformation->cc_country_code == '678' ? 'selected' : '' !!}>Vanuatu (+678)</option>
		<option  value="379" {!!  $client->accountInformation->cc_country_code == '379' ? 'selected' : '' !!}>Vatican City (+379)</option>
		<option  value="58" {!!  $client->accountInformation->cc_country_code == '58' ? 'selected' : '' !!}>Venezuela (+58)</option>
		<option  value="84" {!!  $client->accountInformation->cc_country_code == '84' ? 'selected' : '' !!}>Vietnam (+84)</option>
		<option  value="1284" {!!  $client->accountInformation->cc_country_code == '1284' ? 'selected' : '' !!}>Virgin Islands - British (+1284)</option>
		<option  value="1340" {!!  $client->accountInformation->cc_country_code == '1340' ? 'selected' : '' !!}>Virgin Islands - US (+1340)</option>
		<option  value="681" {!!  $client->accountInformation->cc_country_code == '681' ? 'selected' : '' !!}>Wallis &amp; Futuna (+681)</option>
		<option  value="969" {!!  $client->accountInformation->cc_country_code == '969' ? 'selected' : '' !!}>Yemen (North)(+969)</option>
		<option  value="967" {!!  $client->accountInformation->cc_country_code == '967' ? 'selected' : '' !!}>Yemen (South)(+967)</option>
		<option  value="260" {!!  $client->accountInformation->cc_country_code == '260' ? 'selected' : '' !!}>Zambia (+260)</option>
		<option  value="263" {!!  $client->accountInformation->cc_country_code == '263' ? 'selected' : '' !!}>Zimbabwe (+263)</option>
	 
</select>