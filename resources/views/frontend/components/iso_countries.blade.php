
@php 
    
    $client = Auth::guard('client')->user(); 

@endphp 

<select class="form-control" name="country">
    <option value="AFG" {!!  $client->accountInformation->country == 'AFG' ? 'selected' : '' !!} >Afghanistan</option>
    <option value="ALA" {!!  $client->accountInformation->country == 'ALA' ? 'selected' : '' !!} >Åland Islands</option>
    <option value="ALB" {!!  $client->accountInformation->country == 'ALB' ? 'selected' : '' !!} >Albania</option>
    <option value="DZA" {!!  $client->accountInformation->country == 'DZA' ? 'selected' : '' !!} >Algeria</option>
    <option value="ASM" {!!  $client->accountInformation->country == 'ASM' ? 'selected' : '' !!} >American Samoa</option>
    <option value="AND" {!!  $client->accountInformation->country == 'AND' ? 'selected' : '' !!} >Andorra</option>
    <option value="AGO" {!!  $client->accountInformation->country == 'AGO' ? 'selected' : '' !!} >Angola</option>
    <option value="AIA" {!!  $client->accountInformation->country == 'AIA' ? 'selected' : '' !!} >Anguilla</option>
    <option value="ATA" {!!  $client->accountInformation->country == 'ATA' ? 'selected' : '' !!} >Antarctica</option>
    <option value="ATG" {!!  $client->accountInformation->country == 'ATG' ? 'selected' : '' !!} >Antigua and Barbuda</option>
    <option value="ARG" {!!  $client->accountInformation->country == 'ARG' ? 'selected' : '' !!} >Argentina</option>
    <option value="ARM" {!!  $client->accountInformation->country == 'ARM' ? 'selected' : '' !!} >Armenia</option>
    <option value="ABW" {!!  $client->accountInformation->country == 'ABW' ? 'selected' : '' !!} >Aruba</option>
    <option value="AUS" {!!  $client->accountInformation->country == 'AUS' ? 'selected' : '' !!} >Australia</option>
    <option value="AUT" {!!  $client->accountInformation->country == 'AUT' ? 'selected' : '' !!} >Austria</option>
    <option value="AZE" {!!  $client->accountInformation->country == 'AZE' ? 'selected' : '' !!} >Azerbaijan</option>
    <option value="BHS" {!!  $client->accountInformation->country == 'BHS' ? 'selected' : '' !!} >Bahamas</option>
    <option value="BHR" {!!  $client->accountInformation->country == 'BHR' ? 'selected' : '' !!} >Bahrain</option>
    <option value="BGD" {!!  $client->accountInformation->country == 'BGD' ? 'selected' : '' !!} >Bangladesh</option>
    <option value="BRB" {!!  $client->accountInformation->country == 'BRB' ? 'selected' : '' !!} >Barbados</option>
    <option value="BLR" {!!  $client->accountInformation->country == 'BLR' ? 'selected' : '' !!} >Belarus</option>
    <option value="BEL" {!!  $client->accountInformation->country == 'BEL' ? 'selected' : '' !!} >Belgium</option>
    <option value="BLZ" {!!  $client->accountInformation->country == 'BLZ' ? 'selected' : '' !!} >Belize</option>
    <option value="BEN" {!!  $client->accountInformation->country == 'BEN' ? 'selected' : '' !!} >Benin</option>
    <option value="BMU" {!!  $client->accountInformation->country == 'BMU' ? 'selected' : '' !!} >Bermuda</option>
    <option value="BTN" {!!  $client->accountInformation->country == 'BTN' ? 'selected' : '' !!} >Bhutan</option>
    <option value="BOL" {!!  $client->accountInformation->country == 'BOL' ? 'selected' : '' !!} >Bolivia, Plurinational State of</option>
    <option value="BES" {!!  $client->accountInformation->country == 'BES' ? 'selected' : '' !!} >Bonaire, Sint Eustatius and Saba</option>
    <option value="BIH" {!!  $client->accountInformation->country == 'BIH' ? 'selected' : '' !!} >Bosnia and Herzegovina</option>
    <option value="BWA" {!!  $client->accountInformation->country == 'BWA' ? 'selected' : '' !!} >Botswana</option>
    <option value="BVT" {!!  $client->accountInformation->country == 'BVT' ? 'selected' : '' !!} >Bouvet Island</option>
    <option value="BRA" {!!  $client->accountInformation->country == 'BRA' ? 'selected' : '' !!} >Brazil</option>
    <option value="IOT" {!!  $client->accountInformation->country == 'IOT' ? 'selected' : '' !!} >British Indian Ocean Territory</option>
    <option value="BRN" {!!  $client->accountInformation->country == 'BRN' ? 'selected' : '' !!} >Brunei Darussalam</option>
    <option value="BGR" {!!  $client->accountInformation->country == 'BGR' ? 'selected' : '' !!} >Bulgaria</option>
    <option value="BFA" {!!  $client->accountInformation->country == 'BFA' ? 'selected' : '' !!} >Burkina Faso</option>
    <option value="BDI" {!!  $client->accountInformation->country == 'BDI' ? 'selected' : '' !!} >Burundi</option>
    <option value="KHM" {!!  $client->accountInformation->country == 'KHM' ? 'selected' : '' !!} >Cambodia</option>
    <option value="CMR" {!!  $client->accountInformation->country == 'CMR' ? 'selected' : '' !!} >Cameroon</option>
    <option value="CAN" {!!  $client->accountInformation->country == 'CAN' ? 'selected' : '' !!} >Canada</option>
    <option value="CPV" {!!  $client->accountInformation->country == 'CPV' ? 'selected' : '' !!} >Cape Verde</option>
    <option value="CYM" {!!  $client->accountInformation->country == 'CYM' ? 'selected' : '' !!} >Cayman Islands</option>
    <option value="CAF" {!!  $client->accountInformation->country == 'CAF' ? 'selected' : '' !!} >Central African Republic</option>
    <option value="TCD" {!!  $client->accountInformation->country == 'TCD' ? 'selected' : '' !!} >Chad</option>
    <option value="CHL" {!!  $client->accountInformation->country == 'CHL' ? 'selected' : '' !!} >Chile</option>
    <option value="CHN" {!!  $client->accountInformation->country == 'CHN' ? 'selected' : '' !!} >China</option>
    <option value="CXR" {!!  $client->accountInformation->country == 'CXR' ? 'selected' : '' !!} >Christmas Island</option>
    <option value="CCK" {!!  $client->accountInformation->country == 'CCK' ? 'selected' : '' !!} >Cocos (Keeling) Islands</option>
    <option value="COL" {!!  $client->accountInformation->country == 'COL' ? 'selected' : '' !!} >Colombia</option>
    <option value="COM" {!!  $client->accountInformation->country == 'COM' ? 'selected' : '' !!} >Comoros</option>
    <option value="COG" {!!  $client->accountInformation->country == 'COG' ? 'selected' : '' !!} >Congo</option>
    <option value="COD" {!!  $client->accountInformation->country == 'COD' ? 'selected' : '' !!} >Congo, the Democratic Republic of the</option>
    <option value="COK" {!!  $client->accountInformation->country == 'COK' ? 'selected' : '' !!} >Cook Islands</option>
    <option value="CRI" {!!  $client->accountInformation->country == 'CRI' ? 'selected' : '' !!} >Costa Rica</option>
    <option value="CIV" {!!  $client->accountInformation->country == 'CIV' ? 'selected' : '' !!} >Côte d'Ivoire</option>
    <option value="HRV" {!!  $client->accountInformation->country == 'HRV' ? 'selected' : '' !!} >Croatia</option>
    <option value="CUB" {!!  $client->accountInformation->country == 'CUB' ? 'selected' : '' !!} >Cuba</option>
    <option value="CUW" {!!  $client->accountInformation->country == 'CUW' ? 'selected' : '' !!} >Curaçao</option>
    <option value="CYP" {!!  $client->accountInformation->country == 'CYP' ? 'selected' : '' !!} >Cyprus</option>
    <option value="CZE" {!!  $client->accountInformation->country == 'CZE' ? 'selected' : '' !!} >Czech Republic</option>
    <option value="DNK" {!!  $client->accountInformation->country == 'DNK' ? 'selected' : '' !!} >Denmark</option>
    <option value="DJI" {!!  $client->accountInformation->country == 'DJI' ? 'selected' : '' !!} >Djibouti</option>
    <option value="DMA" {!!  $client->accountInformation->country == 'DMA' ? 'selected' : '' !!} >Dominica</option>
    <option value="DOM" {!!  $client->accountInformation->country == 'DOM' ? 'selected' : '' !!} >Dominican Republic</option>
    <option value="ECU" {!!  $client->accountInformation->country == 'ECU' ? 'selected' : '' !!} >Ecuador</option>
    <option value="EGY" {!!  $client->accountInformation->country == 'EGY' ? 'selected' : '' !!} >Egypt</option>
    <option value="SLV" {!!  $client->accountInformation->country == 'GNQ' ? 'selected' : '' !!} >El Salvador</option>
    <option value="GNQ" {!!  $client->accountInformation->country == 'GNQ' ? 'selected' : '' !!} >Equatorial Guinea</option>
    <option value="ERI" {!!  $client->accountInformation->country == 'ERI' ? 'selected' : '' !!} >Eritrea</option>
    <option value="EST" {!!  $client->accountInformation->country == 'EST' ? 'selected' : '' !!} >Estonia</option>
    <option value="ETH" {!!  $client->accountInformation->country == 'ETH' ? 'selected' : '' !!} >Ethiopia</option>
    <option value="FLK" {!!  $client->accountInformation->country == 'FLK' ? 'selected' : '' !!} >Falkland Islands (Malvinas)</option>
    <option value="FRO" {!!  $client->accountInformation->country == 'FRO' ? 'selected' : '' !!} >Faroe Islands</option>
    <option value="FJI" {!!  $client->accountInformation->country == 'FJI' ? 'selected' : '' !!} >Fiji</option>
    <option value="FIN" {!!  $client->accountInformation->country == 'FIN' ? 'selected' : '' !!} >Finland</option>
    <option value="FRA" {!!  $client->accountInformation->country == 'FRA' ? 'selected' : '' !!} >France</option>
    <option value="GUF" {!!  $client->accountInformation->country == 'GUF' ? 'selected' : '' !!} >French Guiana</option>
    <option value="PYF" {!!  $client->accountInformation->country == 'PYF' ? 'selected' : '' !!} >French Polynesia</option>
    <option value="ATF" {!!  $client->accountInformation->country == 'ATF' ? 'selected' : '' !!} >French Southern Territories</option>
    <option value="GAB" {!!  $client->accountInformation->country == 'GAB' ? 'selected' : '' !!} >Gabon</option>
    <option value="GMB" {!!  $client->accountInformation->country == 'GMB' ? 'selected' : '' !!} >Gambia</option>
    <option value="GEO" {!!  $client->accountInformation->country == 'GEO' ? 'selected' : '' !!} >Georgia</option>
    <option value="DEU" {!!  $client->accountInformation->country == 'DEU' ? 'selected' : '' !!} >Germany</option>
    <option value="GHA" {!!  $client->accountInformation->country == 'GHA' ? 'selected' : '' !!} >Ghana</option>
    <option value="GIB" {!!  $client->accountInformation->country == 'GIB' ? 'selected' : '' !!} >Gibraltar</option>
    <option value="GRC" {!!  $client->accountInformation->country == 'GRC' ? 'selected' : '' !!} >Greece</option>
    <option value="GRL" {!!  $client->accountInformation->country == 'GRL' ? 'selected' : '' !!} >Greenland</option>
    <option value="GRD" {!!  $client->accountInformation->country == 'GRD' ? 'selected' : '' !!} >Grenada</option>
    <option value="GLP" {!!  $client->accountInformation->country == 'GLP' ? 'selected' : '' !!} >Guadeloupe</option>
    <option value="GUM" {!!  $client->accountInformation->country == 'GUM' ? 'selected' : '' !!} >Guam</option>
    <option value="GTM" {!!  $client->accountInformation->country == 'GTM' ? 'selected' : '' !!} >Guatemala</option>
    <option value="GGY" {!!  $client->accountInformation->country == 'GGY' ? 'selected' : '' !!} >Guernsey</option>
    <option value="GIN" {!!  $client->accountInformation->country == 'GIN' ? 'selected' : '' !!} >Guinea</option>
    <option value="GNB" {!!  $client->accountInformation->country == 'GNB' ? 'selected' : '' !!} >Guinea-Bissau</option>
    <option value="GUY" {!!  $client->accountInformation->country == 'GUY' ? 'selected' : '' !!} >Guyana</option>
    <option value="HTI" {!!  $client->accountInformation->country == 'HTI' ? 'selected' : '' !!} >Haiti</option>
    <option value="HMD" {!!  $client->accountInformation->country == 'HMD' ? 'selected' : '' !!} >Heard Island and McDonald Islands</option>
    <option value="VAT" {!!  $client->accountInformation->country == 'VAT' ? 'selected' : '' !!} >Holy See (Vatican City State)</option>
    <option value="HND" {!!  $client->accountInformation->country == 'HND' ? 'selected' : '' !!} >Honduras</option>
    <option value="HKG" {!!  $client->accountInformation->country == 'HKG' ? 'selected' : '' !!} >Hong Kong</option>
    <option value="HUN" {!!  $client->accountInformation->country == 'HUN' ? 'selected' : '' !!} >Hungary</option>
    <option value="ISL" {!!  $client->accountInformation->country == 'ISL' ? 'selected' : '' !!} >Iceland</option>
    <option value="IND" {!!  $client->accountInformation->country == 'IND' ? 'selected' : '' !!} >India</option>
    <option value="IDN" {!!  $client->accountInformation->country == 'IDN' ? 'selected' : '' !!} >Indonesia</option>
    <option value="IRN" {!!  $client->accountInformation->country == 'IRN' ? 'selected' : '' !!} >Iran, Islamic Republic of</option>
    <option value="IRQ" {!!  $client->accountInformation->country == 'IRQ' ? 'selected' : '' !!} >Iraq</option>
    <option value="IRL" {!!  $client->accountInformation->country == 'IRL' ? 'selected' : '' !!} >Ireland</option>
    <option value="IMN" {!!  $client->accountInformation->country == 'IMN' ? 'selected' : '' !!} >Isle of Man</option>
    <option value="ISR" {!!  $client->accountInformation->country == 'ISR' ? 'selected' : '' !!} >Israel</option>
    <option value="ITA" {!!  $client->accountInformation->country == 'ITA' ? 'selected' : '' !!} >Italy</option>
    <option value="JAM" {!!  $client->accountInformation->country == 'JAM' ? 'selected' : '' !!} >Jamaica</option>
    <option value="JPN" {!!  $client->accountInformation->country == 'JPN' ? 'selected' : '' !!} >Japan</option>
    <option value="JEY" {!!  $client->accountInformation->country == 'JEY' ? 'selected' : '' !!} >Jersey</option>
    <option value="JOR" {!!  $client->accountInformation->country == 'JOR' ? 'selected' : '' !!} >Jordan</option>
    <option value="KAZ" {!!  $client->accountInformation->country == 'KAZ' ? 'selected' : '' !!} >Kazakhstan</option>
    <option value="KEN" {!!  $client->accountInformation->country == 'KEN' ? 'selected' : '' !!} >Kenya</option>
    <option value="KIR" {!!  $client->accountInformation->country == 'KIR' ? 'selected' : '' !!} >Kiribati</option>
    <option value="PRK" {!!  $client->accountInformation->country == 'PRK' ? 'selected' : '' !!} >Korea, Democratic People's Republic of</option>
    <option value="KOR" {!!  $client->accountInformation->country == 'KOR' ? 'selected' : '' !!} >Korea, Republic of</option>
    <option value="KOR" {!!  $client->accountInformation->country == 'KOR' ? 'selected' : '' !!} >Kuwait</option>
    <option value="KGZ" {!!  $client->accountInformation->country == 'KGZ' ? 'selected' : '' !!} >Kyrgyzstan</option>
    <option value="LAO" {!!  $client->accountInformation->country == 'LAO' ? 'selected' : '' !!} >Lao People's Democratic Republic</option>
    <option value="LVA" {!!  $client->accountInformation->country == 'LVA' ? 'selected' : '' !!} >Latvia</option>
    <option value="LBN" {!!  $client->accountInformation->country == 'LBN' ? 'selected' : '' !!} >Lebanon</option>
    <option value="LSO" {!!  $client->accountInformation->country == 'LSO' ? 'selected' : '' !!} >Lesotho</option>
    <option value="LBR" {!!  $client->accountInformation->country == 'LBR' ? 'selected' : '' !!} >Liberia</option>
    <option value="LBY" {!!  $client->accountInformation->country == 'LBY' ? 'selected' : '' !!} >Libya</option>
    <option value="LIE" {!!  $client->accountInformation->country == 'LIE' ? 'selected' : '' !!} >Liechtenstein</option>
    <option value="LTU" {!!  $client->accountInformation->country == 'LTU' ? 'selected' : '' !!} >Lithuania</option>
    <option value="LUX" {!!  $client->accountInformation->country == 'LUX' ? 'selected' : '' !!} >Luxembourg</option>
    <option value="MAC" {!!  $client->accountInformation->country == 'MAC' ? 'selected' : '' !!} >Macao</option>
    <option value="MKD" {!!  $client->accountInformation->country == 'MKD' ? 'selected' : '' !!} >Macedonia, the former Yugoslav Republic of</option>
    <option value="MDG" {!!  $client->accountInformation->country == 'MDG' ? 'selected' : '' !!} >Madagascar</option>
    <option value="MWI" {!!  $client->accountInformation->country == 'MWI' ? 'selected' : '' !!} >Malawi</option>
    <option value="MYS" {!!  $client->accountInformation->country == 'MYS' ? 'selected' : '' !!} >Malaysia</option>
    <option value="MDV" {!!  $client->accountInformation->country == 'MDV' ? 'selected' : '' !!} >Maldives</option>
    <option value="MLI" {!!  $client->accountInformation->country == 'MLI' ? 'selected' : '' !!} >Mali</option>
    <option value="MLTA" {!!  $client->accountInformation->country == 'MLTA' ? 'selected' : '' !!} >Malta</option>
    <option value="MHL" {!!  $client->accountInformation->country == 'MHL' ? 'selected' : '' !!} >Marshall Islands</option>
    <option value="MTQ" {!!  $client->accountInformation->country == 'MTQ' ? 'selected' : '' !!} >Martinique</option>
    <option value="MRT" {!!  $client->accountInformation->country == 'MRT' ? 'selected' : '' !!} >Mauritania</option>
    <option value="MUS" {!!  $client->accountInformation->country == 'MUS' ? 'selected' : '' !!} >Mauritius</option>
    <option value="MYT" {!!  $client->accountInformation->country == 'MYT' ? 'selected' : '' !!} >Mayotte</option>
    <option value="MEX" {!!  $client->accountInformation->country == 'MEX' ? 'selected' : '' !!} >Mexico</option>
    <option value="FSM" {!!  $client->accountInformation->country == 'FSM' ? 'selected' : '' !!} >Micronesia, Federated States of</option>
    <option value="MDA" {!!  $client->accountInformation->country == 'MDA' ? 'selected' : '' !!} >Moldova, Republic of</option>
    <option value="MCO" {!!  $client->accountInformation->country == 'MCO' ? 'selected' : '' !!} >Monaco</option>
    <option value="MNG" {!!  $client->accountInformation->country == 'MNG' ? 'selected' : '' !!} >Mongolia</option>
    <option value="MNE" {!!  $client->accountInformation->country == 'MNE' ? 'selected' : '' !!} >Montenegro</option>
    <option value="MSR" {!!  $client->accountInformation->country == 'MSR' ? 'selected' : '' !!} >Montserrat</option>
    <option value="MAR" {!!  $client->accountInformation->country == 'MAR' ? 'selected' : '' !!} >Morocco</option>
    <option value="MOZ" {!!  $client->accountInformation->country == 'MOZ' ? 'selected' : '' !!} >Mozambique</option>
    <option value="MMR" {!!  $client->accountInformation->country == 'MMR' ? 'selected' : '' !!} >Myanmar</option>
    <option value="NAM" {!!  $client->accountInformation->country == 'NAM' ? 'selected' : '' !!} >Namibia</option>
    <option value="NRU" {!!  $client->accountInformation->country == 'NRU' ? 'selected' : '' !!} >Nauru</option>
    <option value="NPL" {!!  $client->accountInformation->country == 'NPL' ? 'selected' : '' !!} >Nepal</option>
    <option value="NLD" {!!  $client->accountInformation->country == 'NLD' ? 'selected' : '' !!} >Netherlands</option>
    <option value="NCL" {!!  $client->accountInformation->country == 'NCL' ? 'selected' : '' !!} >New Caledonia</option>
    <option value="NZL" {!!  $client->accountInformation->country == 'NZL' ? 'selected' : '' !!} >New Zealand</option>
    <option value="NIC" {!!  $client->accountInformation->country == 'NIC' ? 'selected' : '' !!} >Nicaragua</option>
    <option value="NER" {!!  $client->accountInformation->country == 'NER' ? 'selected' : '' !!} >Niger</option>
    <option value="NGA" {!!  $client->accountInformation->country == 'NGA' ? 'selected' : '' !!} >Nigeria</option>
    <option value="NIU" {!!  $client->accountInformation->country == 'NIU' ? 'selected' : '' !!} >Niue</option>
    <option value="NFK" {!!  $client->accountInformation->country == 'NFK' ? 'selected' : '' !!} >Norfolk Island</option>
    <option value="MNP" {!!  $client->accountInformation->country == 'MNP' ? 'selected' : '' !!} >Northern Mariana Islands</option>
    <option value="NOR" {!!  $client->accountInformation->country == 'NOR' ? 'selected' : '' !!} >Norway</option>
    <option value="OMN" {!!  $client->accountInformation->country == 'OMN' ? 'selected' : '' !!} >Oman</option>
    <option value="PAK" {!!  $client->accountInformation->country == 'PAK' ? 'selected' : '' !!} >Pakistan</option>
    <option value="PLW" {!!  $client->accountInformation->country == 'PLW' ? 'selected' : '' !!} >Palau</option>
    <option value="PSE" {!!  $client->accountInformation->country == 'PSE' ? 'selected' : '' !!} >Palestinian Territory, Occupied</option>
    <option value="PAN" {!!  $client->accountInformation->country == 'PAN' ? 'selected' : '' !!} >Panama</option>
    <option value="PNG" {!!  $client->accountInformation->country == 'PNG' ? 'selected' : '' !!} >Papua New Guinea</option>
    <option value="PRY" {!!  $client->accountInformation->country == 'PRY' ? 'selected' : '' !!} >Paraguay</option>
    <option value="PER" {!!  $client->accountInformation->country == 'PER' ? 'selected' : '' !!} >Peru</option>
    <option value="PHL" {!!  $client->accountInformation->country == 'PHL' ? 'selected' : '' !!} >Philippines</option>
    <option value="PCN" {!!  $client->accountInformation->country == 'PCN' ? 'selected' : '' !!} >Pitcairn</option>
    <option value="POL" {!!  $client->accountInformation->country == 'POL' ? 'selected' : '' !!} >Poland</option>
    <option value="PRT" {!!  $client->accountInformation->country == 'PRT' ? 'selected' : '' !!} >Portugal</option>
    <option value="PRI" {!!  $client->accountInformation->country == 'PRI' ? 'selected' : '' !!} >Puerto Rico</option>
    <option value="QAT" {!!  $client->accountInformation->country == 'QAT' ? 'selected' : '' !!} >Qatar</option>
    <option value="REU" {!!  $client->accountInformation->country == 'REU' ? 'selected' : '' !!} >Réunion</option>
    <option value="ROU" {!!  $client->accountInformation->country == 'ROU' ? 'selected' : '' !!} >Romania</option>
    <option value="RUS" {!!  $client->accountInformation->country == 'RUS' ? 'selected' : '' !!} >Russian Federation</option>
    <option value="RWA" {!!  $client->accountInformation->country == 'RWA' ? 'selected' : '' !!} >Rwanda</option>
    <option value="BLM" {!!  $client->accountInformation->country == 'BLM' ? 'selected' : '' !!} >Saint Barthélemy</option>
    <option value="SHN" {!!  $client->accountInformation->country == 'SHN' ? 'selected' : '' !!} >Saint Helena, Ascension and Tristan da Cunha</option>
    <option value="KNA" {!!  $client->accountInformation->country == 'KNA' ? 'selected' : '' !!} >Saint Kitts and Nevis</option>
    <option value="LCA" {!!  $client->accountInformation->country == 'LCA' ? 'selected' : '' !!} >Saint Lucia</option>
    <option value="MAF" {!!  $client->accountInformation->country == 'MAF' ? 'selected' : '' !!} >Saint Martin (French part)</option>
    <option value="SPM" {!!  $client->accountInformation->country == 'SPM' ? 'selected' : '' !!} >Saint Pierre and Miquelon</option>
    <option value="VCT" {!!  $client->accountInformation->country == 'VCT' ? 'selected' : '' !!} >Saint Vincent and the Grenadines</option>
    <option value="WSM" {!!  $client->accountInformation->country == 'WSM' ? 'selected' : '' !!} >Samoa</option>
    <option value="SMR" {!!  $client->accountInformation->country == 'SMR' ? 'selected' : '' !!} >San Marino</option>
    <option value="STP" {!!  $client->accountInformation->country == 'STP' ? 'selected' : '' !!} >Sao Tome and Principe</option>
    <option value="SAU" {!!  $client->accountInformation->country == 'SAU' ? 'selected' : '' !!} >Saudi Arabia</option>
    <option value="SEN" {!!  $client->accountInformation->country == 'SEN' ? 'selected' : '' !!} >Senegal</option>
    <option value="SRB" {!!  $client->accountInformation->country == 'SRB' ? 'selected' : '' !!} >Serbia</option>
    <option value="SYC" {!!  $client->accountInformation->country == 'SYC' ? 'selected' : '' !!} >Seychelles</option>
    <option value="SLE" {!!  $client->accountInformation->country == 'SLE' ? 'selected' : '' !!} >Sierra Leone</option>
    <option value="SGP" {!!  $client->accountInformation->country == 'SGP' ? 'selected' : '' !!} >Singapore</option>
    <option value="SXM" {!!  $client->accountInformation->country == 'SXM' ? 'selected' : '' !!} >Sint Maarten (Dutch part)</option>
    <option value="SVK" {!!  $client->accountInformation->country == 'SVK' ? 'selected' : '' !!} >Slovakia</option>
    <option value="SVN" {!!  $client->accountInformation->country == 'SVN' ? 'selected' : '' !!} >Slovenia</option>
    <option value="SLB" {!!  $client->accountInformation->country == 'SLB' ? 'selected' : '' !!} >Solomon Islands</option>
    <option value="SOM" {!!  $client->accountInformation->country == 'SOM' ? 'selected' : '' !!} >Somalia</option>
    <option value="ZAF" {!!  $client->accountInformation->country == 'ZAF' ? 'selected' : '' !!} >South Africa</option>
    <option value="SGS" {!!  $client->accountInformation->country == 'SGS' ? 'selected' : '' !!} >South Georgia and the South Sandwich Islands</option>
    <option value="SSD" {!!  $client->accountInformation->country == 'SSD' ? 'selected' : '' !!} >South Sudan</option>
    <option value="ESP" {!!  $client->accountInformation->country == 'ESP' ? 'selected' : '' !!} >Spain</option>
    <option value="LKA" {!!  $client->accountInformation->country == 'LKA' ? 'selected' : '' !!} >Sri Lanka</option>
    <option value="SDN" {!!  $client->accountInformation->country == 'SDN' ? 'selected' : '' !!} >Sudan</option>
    <option value="SUR" {!!  $client->accountInformation->country == 'SUR' ? 'selected' : '' !!} >Suriname</option>
    <option value="SJM" {!!  $client->accountInformation->country == 'SJM' ? 'selected' : '' !!} >Svalbard and Jan Mayen</option>
    <option value="SWZ" {!!  $client->accountInformation->country == 'SWZ' ? 'selected' : '' !!} >Swaziland</option>
    <option value="SWE" {!!  $client->accountInformation->country == 'SWE' ? 'selected' : '' !!} >Sweden</option>
    <option value="CHE" {!!  $client->accountInformation->country == 'CHE' ? 'selected' : '' !!} >Switzerland</option>
    <option value="SYR" {!!  $client->accountInformation->country == 'SYR' ? 'selected' : '' !!} >Syrian Arab Republic</option>
    <option value="TWN" {!!  $client->accountInformation->country == 'TWN' ? 'selected' : '' !!} >Taiwan, Province of China</option>
    <option value="TJK" {!!  $client->accountInformation->country == 'TJK' ? 'selected' : '' !!} >Tajikistan</option>
    <option value="TZA" {!!  $client->accountInformation->country == 'TZA' ? 'selected' : '' !!} >Tanzania, United Republic of</option>
    <option value="THA" {!!  $client->accountInformation->country == 'THA' ? 'selected' : '' !!} >Thailand</option>
    <option value="TLS" {!!  $client->accountInformation->country == 'TLS' ? 'selected' : '' !!} >Timor-Leste</option>
    <option value="TGO" {!!  $client->accountInformation->country == 'TGO' ? 'selected' : '' !!} >Togo</option>
    <option value="TKL" {!!  $client->accountInformation->country == 'TKL' ? 'selected' : '' !!} >Tokelau</option>
    <option value="TON" {!!  $client->accountInformation->country == 'TON' ? 'selected' : '' !!} >Tonga</option>
    <option value="TTO" {!!  $client->accountInformation->country == 'TTO' ? 'selected' : '' !!} >Trinidad and Tobago</option>
    <option value="TUN" {!!  $client->accountInformation->country == 'TUN' ? 'selected' : '' !!} >Tunisia</option>
    <option value="TUR" {!!  $client->accountInformation->country == '44' ? 'selected' : '' !!} >Turkey</option>
    <option value="TKM" {!!  $client->accountInformation->country == 'TKM' ? 'selected' : '' !!} >Turkmenistan</option>
    <option value="TCA" {!!  $client->accountInformation->country == 'TCA' ? 'selected' : '' !!} >Turks and Caicos Islands</option>
    <option value="TUV" {!!  $client->accountInformation->country == 'TUV' ? 'selected' : '' !!} >Tuvalu</option>
    <option value="UGA" {!!  $client->accountInformation->country == 'UGA' ? 'selected' : '' !!} >Uganda</option>
    <option value="UKR" {!!  $client->accountInformation->country == 'UKR' ? 'selected' : '' !!} >Ukraine</option>
    <option value="ARE" {!!  $client->accountInformation->country == 'ARE' ? 'selected' : '' !!} >United Arab Emirates</option>
    <option value="GBR" {!!  $client->accountInformation->country == 'GBR' ? 'selected' : '' !!} >United Kingdom</option>
    <option value="USA" {!!  $client->accountInformation->country == 'USA' ? 'selected' : '' !!} >United States</option>
    <option value="UMI" {!!  $client->accountInformation->country == 'UMI' ? 'selected' : '' !!} >United States Minor Outlying Islands</option>
    <option value="URY" {!!  $client->accountInformation->country == 'URY' ? 'selected' : '' !!} >Uruguay</option>
    <option value="UZB" {!!  $client->accountInformation->country == 'UZB' ? 'selected' : '' !!} >Uzbekistan</option>
    <option value="VUT" {!!  $client->accountInformation->country == 'VUT' ? 'selected' : '' !!} >Vanuatu</option>
    <option value="VEN" {!!  $client->accountInformation->country == 'VEN' ? 'selected' : '' !!} >Venezuela, Bolivarian Republic of</option>
    <option value="VNM" {!!  $client->accountInformation->country == 'VNM' ? 'selected' : '' !!} >Viet Nam</option>
    <option value="VGB" {!!  $client->accountInformation->country == 'VGB' ? 'selected' : '' !!} >Virgin Islands, British</option>
    <option value="VIR" {!!  $client->accountInformation->country == 'VIR' ? 'selected' : '' !!} >Virgin Islands, U.S.</option>
    <option value="WLF" {!!  $client->accountInformation->country == 'WLF' ? 'selected' : '' !!} >Wallis and Futuna</option>
    <option value="ESH" {!!  $client->accountInformation->country == 'ESH' ? 'selected' : '' !!} >Western Sahara</option>
    <option value="YEM" {!!  $client->accountInformation->country == 'YEM' ? 'selected' : '' !!} >Yemen</option>
    <option value="ZMB" {!!  $client->accountInformation->country == 'ZMB' ? 'selected' : '' !!} >Zambia</option>
    <option value="ZWE" {!!  $client->accountInformation->country == 'ZWE' ? 'selected' : '' !!} >Zimbabwe</option>
</select>