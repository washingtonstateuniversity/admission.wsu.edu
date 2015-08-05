<script>
(function($){
	$("#disclose-additional").on("click", function() {
		$("#additional-info").toggleClass("closed");
	});
})(jQuery);
</script>


<p>Tell us a bit about yourself so we can send you the right information.</p>

<form action="https://goto.wsu.edu/Info" id="InfoRequestForm" method="post">
	       
	<fieldset>
	   	
	   	<legend>Name</legend>
		
	    <label class="hidden">Legal First Name *</label>
	    <input class="required" id="FirstName" name="FirstName" type="text" value="" placeholder="Legal First Name (Required)">

	    <label class="hidden">Middle Name</label>
	    <input id="MiddleName" name="MiddleName" type="text" value="" placeholder="Middle Name">

	    <label class="hidden">Last Name *</label>
	    <input class="required" id="LastName" name="LastName" type="text" value="" placeholder="Last Name">
		
	</fieldset>

	<fieldset>
		
		<legend>Email</legend>
	
	    <label class="hidden">Email *</label>
	    <div class="itemValue"><input class="required" id="Email" name="Email" type="text" value="" placeholder="Email Address"></div>
	            
	</fieldset>
	    
	<fieldset id="address" class="address">
		
		<legend>Address</legend>
	
	    <label class="hidden">Mailing Address Line 1 *</label>
	    <div class="itemValue"><input class="required" id="Address1" name="Address1" type="text" value="" placeholder="Mailing Address (Line One)">
		    
		<label class="hidden">Mailing Address Line 2</label>
		<div class="itemValue"><input id="Address2" name="Address2" type="text" value="" placeholder="Mailing Address (Line Two)"></div>
	
	    <label class="hidden">City *</label>
	    <input class="required" id="City" name="City" type="text" value="" placeholder="City">
	
	    <!-- Select State -->
	    <label class="hidden">State *</label>
	    <select class="required" id="State" name="State">
	            <option value="">Select State</option>
	            <option value="WA">WA - Washington</option>
				<option value="AL">AL - Alabama</option>
				<option value="AK">AK - Alaska</option>
				<option value="AZ">AZ - Arizona</option>
				<option value="AR">AR - Arkansas</option>
				<option value="CA">CA - California</option>
				<option value="CO">CO - Colorado</option>
				<option value="CT">CT - Connecticut</option>
				<option value="DC">DC - District of Columbia</option>
				<option value="DE">DE - Delaware</option>
				<option value="FL">FL - Florida</option>
				<option value="GA">GA - Georgia</option>
				<option value="HI">HI - Hawaii</option>
				<option value="ID">ID - Idaho</option>
				<option value="IL">IL - Illinois</option>
				<option value="IN">IN - Indiana</option>
				<option value="IA">IA - Iowa</option>
				<option value="KS">KS - Kansas</option>
				<option value="KY">KY - Kentucky</option>
				<option value="LA">LA - Louisiana</option>
				<option value="ME">ME - Maine</option>
				<option value="MD">MD - Maryland</option>
				<option value="MA">MA - Massachusetts</option>
				<option value="MI">MI - Michigan</option>
				<option value="MN">MN - Minnesota</option>
				<option value="MS">MS - Mississippi</option>
				<option value="MO">MO - Missouri</option>
				<option value="MT">MT - Montana</option>
				<option value="NE">NE - Nebraska</option>
				<option value="NV">NV - Nevada</option>
				<option value="NH">NH - New Hampshire</option>
				<option value="NJ">NJ - New Jersey</option>
				<option value="NM">NM - New Mexico</option>
				<option value="NY">NY - New York</option>
				<option value="NC">NC - North Carolina</option>
				<option value="ND">ND - North Dakota</option>
				<option value="OH">OH - Ohio</option>
				<option value="OK">OK - Oklahoma</option>
				<option value="OR">OR - Oregon</option>
				<option value="PA">PA - Pennsylvania</option>
				<option value="RI">RI - Rhode Island</option>
				<option value="SC">SC - South Carolina</option>
				<option value="SD">SD - South Dakota</option>
				<option value="TN">TN - Tennessee</option>
				<option value="TX">TX - Texas</option>
				<option value="UT">UT - Utah</option>
				<option value="VT">VT - Vermont</option>
				<option value="VA">VA - Virginia</option>
				<option value="WV">WV - West Virginia</option>
				<option value="WI">WI - Wisconsin</option>
				<option value="WY">WY - Wyoming</option>
				<option value="">---</option>
				<option value="AS">AS - American Samoa</option>
				<option value="GU">GU - Guam</option>
				<option value="MP">MP - Northern Mariana Islands</option>
				<option value="PR">PR - Puerto Rico</option>
				<option value="VI">VI - U.S. Virgin Islands</option>
			</select>
	
	    <!-- Country Select -->
	    <label for="Country" class="hidden">Country</label>
	    <select id="Country" name="Country">
	            <option value="">Select Country</option>
	            <option value="USA">United States of America</option>
				<option value="AFG">Afghanistan</option>
				<option value="ALA">Aland Islands</option>
				<option value="ALB">Albania</option>
				<option value="DZA">Algeria</option>
				<option value="ASM">American Samoa</option>
				<option value="AND">Andorra</option>
				<option value="AGO">Angola</option>
				<option value="AIA">Anguilla</option>
				<option value="ATA">Antarctica</option>
				<option value="ATG">Antigua &amp; Barbuda</option>
				<option value="ARG">Argentina</option>
				<option value="ARM">Armenia</option>
				<option value="ABW">Aruba</option>
				<option value="AUS">Australia</option>
				<option value="AUT">Austria</option>
				<option value="AZE">Azerbaijan</option>
				<option value="BHS">Bahamas</option>
				<option value="BHR">Bahrain</option>
				<option value="BGD">Bangladesh</option>
				<option value="BRB">Barbados</option>
				<option value="BLR">Belarus</option>
				<option value="BEL">Belgium</option>
				<option value="BLZ">Belize</option>
				<option value="BEN">Benin</option>
				<option value="BMU">Bermuda</option>
				<option value="BTN">Bhutan</option>
				<option value="BOL">Bolivia</option>
				<option value="BIH">Bosnia and Herzegovinia</option>
				<option value="BWA">Botswana</option>
				<option value="BVT">Bouvet Island</option>
				<option value="BRA">Brazil</option>
				<option value="IOT">British Indian Ocean Territory</option>
				<option value="BRN">Brunei Darussalam</option>
				<option value="BGR">Bulgaria</option>
				<option value="BFA">Burkina Faso</option>
				<option value="BDI">Burundi</option>
				<option value="KHM">Cambodia</option>
				<option value="CMR">Cameroon</option>
				<option value="CAN">Canada</option>
				<option value="CPV">Cape Verde</option>
				<option value="CYM">Cayman Islands</option>
				<option value="CAF">Central African Republic</option>
				<option value="TCD">Chad</option>
				<option value="CHL">Chile</option>
				<option value="CHN">China</option>
				<option value="CXR">Christmas Island</option>
				<option value="CCK">Cocos (Keeling) Islands</option>
				<option value="COL">Colombia</option>
				<option value="COM">Comoros</option>
				<option value="COG">Congo</option>
				<option value="COD">Congo, The Democratic Republic</option>
				<option value="COK">Cook Islands</option>
				<option value="CRI">Costa Rica</option>
				<option value="CIV">Cote D'ivoire</option>
				<option value="HRV">Croatia</option>
				<option value="CUB">Cuba</option>
				<option value="CYP">Cyprus</option>
				<option value="CZE">Czech Republic</option>
				<option value="DNK">Denmark</option>
				<option value="DJI">Djibouti</option>
				<option value="DMA">Dominica</option>
				<option value="DOM">Dominican Republic</option>
				<option value="TLS">East Timor</option>
				<option value="ECU">Ecuador</option>
				<option value="EGY">Egypt</option>
				<option value="SLV">El Salvador</option>
				<option value="ENG">England</option>
				<option value="GNQ">Equatorial Guinea</option>
				<option value="ERI">Eritrea</option>
				<option value="EST">Estonia</option>
				<option value="ETH">Ethiopia</option>
				<option value="FLK">Falkland Islands (Malvinas)</option>
				<option value="FRO">Faroe Islands</option>
				<option value="FJI">Fiji</option>
				<option value="FIN">Finland</option>
				<option value="MKD">Fmr Yugoslav Rep of Macedonia</option>
				<option value="FRA">France</option>
				<option value="GUF">French Guiana</option>
				<option value="PYF">French Polynesia</option>
				<option value="ATF">French Southern Territories</option>
				<option value="GAB">Gabon</option>
				<option value="GMB">Gambia</option>
				<option value="GEO">Georgia</option>
				<option value="DEU">Germany</option>
				<option value="GHA">Ghana</option>
				<option value="GIB">Gibraltar</option>
				<option value="GRC">Greece</option>
				<option value="GRL">Greenland</option>
				<option value="GRD">Grenada</option>
				<option value="GLP">Guadeloupe</option>
				<option value="GUM">Guam</option>
				<option value="GTM">Guatemala</option>
				<option value="GGY">Guernsey</option>
				<option value="GIN">Guinea</option>
				<option value="GNB">Guinea-Bissau</option>
				<option value="GUY">Guyana</option>
				<option value="HTI">Haiti</option>
				<option value="HMD">Heard &amp; McDonald Islands</option>
				<option value="VAT">Holy See (Vatican City State)</option>
				<option value="HND">Honduras</option>
				<option value="HKG">Hong Kong</option>
				<option value="HUN">Hungary</option>
				<option value="ISL">Iceland</option>
				<option value="IND">India</option>
				<option value="IDN">Indonesia</option>
				<option value="IRN">Iran (Islamic Republic Of)</option>
				<option value="IRQ">Iraq</option>
				<option value="IRL">Ireland</option>
				<option value="IMN">Isle of Man</option>
				<option value="ISR">Israel</option>
				<option value="ITA">Italy</option>
				<option value="JAM">Jamaica</option>
				<option value="JPN">Japan</option>
				<option value="JEY">Jersey</option>
				<option value="JOR">Jordan</option>
				<option value="KAZ">Kazakhstan</option>
				<option value="KEN">Kenya</option>
				<option value="KIR">Kiribati</option>
				<option value="PRK">Korea, Democratic People's Rep</option>
				<option value="KOR">Korea, Republic of</option>
				<option value="KOS">Kosovo</option>
				<option value="KWT">Kuwait</option>
				<option value="KGZ">Kyrgyzstan</option>
				<option value="LAO">Lao People's Democratic Rep</option>
				<option value="LVA">Latvia</option>
				<option value="LBN">Lebanon</option>
				<option value="LSO">Lesotho</option>
				<option value="LBR">Liberia</option>
				<option value="LBY">Libian Arab Jamahiriya</option>
				<option value="LIE">Liechtenstein</option>
				<option value="LTU">Lithuania</option>
				<option value="LUX">Luxembourg</option>
				<option value="MAC">Macau</option>
				<option value="MDG">Madagascar</option>
				<option value="MWI">Malawi</option>
				<option value="MYS">Malaysia</option>
				<option value="MDV">Maldives</option>
				<option value="MLI">Mali</option>
				<option value="MLT">Malta</option>
				<option value="MHL">Marshall Islands</option>
				<option value="MTQ">Martinique</option>
				<option value="MRT">Mauritania</option>
				<option value="MUS">Mauritius</option>
				<option value="MYT">Mayotte</option>
				<option value="MEX">Mexico</option>
				<option value="FSM">Micronesia, Federated States</option>
				<option value="MDA">Moldova</option>
				<option value="MCO">Monaco</option>
				<option value="MNG">Mongolia</option>
				<option value="MSR">Montserrat</option>
				<option value="MAR">Morocco</option>
				<option value="MOZ">Mozambique</option>
				<option value="MMR">Myanmar</option>
				<option value="NAM">Namibia</option>
				<option value="NRU">Nauru</option>
				<option value="NPL">Nepal</option>
				<option value="NLD">Netherlands</option>
				<option value="ANT">Netherlands Antilles</option>
				<option value="NCL">New Caledonia</option>
				<option value="NZL">New Zealand</option>
				<option value="NIC">Nicaragua</option>
				<option value="NER">Niger</option>
				<option value="NGA">Nigeria</option>
				<option value="NIU">Niue</option>
				<option value="NFK">Norfolk Island</option>
				<option value="NIR">Northern Ireland</option>
				<option value="MNP">Northern Mariana Islands</option>
				<option value="NOR">Norway</option>
				<option value="NRE">Not Reported</option>
				<option value="OMN">Oman</option>
				<option value="PAK">Pakistan</option>
				<option value="PLW">Palau</option>
				<option value="PSE">Palestinian Territory, Occupie</option>
				<option value="PAN">Panama</option>
				<option value="PNG">Papua New Guinea</option>
				<option value="PRY">Paraguay</option>
				<option value="PER">Peru</option>
				<option value="PHL">Philippines</option>
				<option value="PCN">Pitcairn</option>
				<option value="POL">Poland</option>
				<option value="PRT">Portugal</option>
				<option value="PRI">Puerto Rico</option>
				<option value="QAT">Qatar</option>
				<option value="MNE">Republic of Montenegro</option>
				<option value="REU">Reunion</option>
				<option value="ROU">Romania</option>
				<option value="RUS">Russian Federation</option>
				<option value="RWA">Rwanda</option>
				<option value="BLM">Saint Barthelemy</option>
				<option value="SHN">Saint Helena</option>
				<option value="KNA">Saint Kitts and Nevis</option>
				<option value="LCA">Saint Lucia</option>
				<option value="MAF">Saint Martin</option>
				<option value="SPM">Saint Pierre &amp; Miquelon</option>
				<option value="VCT">Saint Vincent &amp; The Grenadines</option>
				<option value="WSM">Samoa</option>
				<option value="SMR">San Marino</option>
				<option value="STP">Sao Tome &amp; Principe</option>
				<option value="SAU">Saudi Arabia</option>
				<option value="SCT">Scotland</option>
				<option value="SEN">Senegal</option>
				<option value="SYC">Seychelles</option>
				<option value="SLE">Sierra Leone</option>
				<option value="SGP">Singapore</option>
				<option value="SVK">Slovakia</option>
				<option value="SVN">Slovenia</option>
				<option value="SLB">Solomon Islands</option>
				<option value="SOM">Somalia</option>
				<option value="ZAF">South Africa</option>
				<option value="SGS">South Georgia &amp; South Sandwich Isle</option>
				<option value="ESP">Spain</option>
				<option value="LKA">Sri Lanka</option>
				<option value="SDN">Sudan</option>
				<option value="SUR">Suriname</option>
				<option value="SJM">Svalbard &amp; Jan Mayen Islands</option>
				<option value="SWZ">Swaziland</option>
				<option value="SWE">Sweden</option>
				<option value="CHE">Switzerland</option>
				<option value="SYR">Syrian Arab Republic</option>
				<option value="TWN">Taiwan, Province of China</option>
				<option value="TJK">Tajikistan</option>
				<option value="TZA">Tanzania, United Republic of</option>
				<option value="THA">Thailand</option>
				<option value="TGO">Togo</option>
				<option value="TKL">Tokelau</option>
				<option value="TON">Tonga</option>
				<option value="TTO">Trinidad &amp; Tobago</option>
				<option value="TUN">Tunisia</option>
				<option value="TUR">Turkey</option>
				<option value="TKM">Turkmenistan</option>
				<option value="TCA">Turks &amp; Caicos Islands</option>
				<option value="TUV">Tuvalu</option>
				<option value="UGA">Uganda</option>
				<option value="UKR">Ukraine</option>
				<option value="ARE">United Arab Emirates</option>
				<option value="GBR">United Kingdom</option>
				<option value="UMI">United States Minor Out. Islands</option>
				<option value="URY">Uruguay</option>
				<option value="UZB">Uzbekistan</option>
				<option value="VUT">Vanuatu</option>
				<option value="VEN">Venezuela</option>
				<option value="VNM">Vietnam</option>
				<option value="VGB">Virgin Islands (British)</option>
				<option value="VIR">Virgin Islands (U.S.)</option>
				<option value="WAL">Wales</option>
				<option value="WLF">Wallis &amp; Futuna Islands</option>
				<option value="ESH">Western Sahara</option>
				<option value="YEM">Yemen</option>
				<option value="YUG">Yugoslavia</option>
				<option value="ZMB">Zambia</option>
				<option value="ZWE">Zimbabwe</option>
			</select>
		
		<!-- ZIP -->
	    <label for="ZipCode" class="hidden">ZIP Code *</label>
	    <input class="required" id="ZipCode" maxlength="10" name="ZipCode" type="text" value="" placeholder="ZIP Code">
	
	</fieldset>
	
	<fieldset>
		
		<legend>Phone</legend>
		
        <label class="hidden">Phone * (10-digit phone number with area code)</label>
        <input class="required" id="Phone" name="Phone" type="text" value="" placeholder="Phone Number">
   
        <label>Phone Type *</label>
        <select class="SelectMobilePhone required" id="PhoneType" name="PhoneType" onchange="updatePhoneType();">
            <option value="Mobile" selected="">Mobile</option>
			<option value="Home">Home</option>
			<option value="Other">Other</option>
		</select>

        <label>Mobile Phone Service *</label>
        <select id="MobileProvider" name="MobileProvider">
	        <option value=""></option>
			<option value="Airtel">Airtel</option>
			<option value="CBeyond">C Beyond</option>
		</select>
				
        <label class="hidden">Okay to text important deadline reminders? *</label>
        <select id="OkayToText" name="OkayToText">
            <option value=""></option>
			<option value="YES">Yes</option>
			<option value="NO">No</option>
		</select>
	
	</fieldset>

	    
	    <input type="button" name="hideInfo" id="hideInfo" value="Submit Basic Info Only" onclick="HideAdditionalInfo();" style="display:none;">
	    
	    <hr>
	    
	    <button id="disclose-additional" class="secondary" type="button" onclick="return false;">Tell us more</button>
	    
	    <span>Or</span>
	    
		<input id="ExpandAdditionalInfo" name="ExpandAdditionalInfo" type="hidden" value="">

	<hr id="additional-info" class="closed">
	<header>Additional Info</header>

    <fieldset class="academic-interest">
	    
	    <!-- 1st Academic Interest -->
        <label>1st Academic Interest</label>
        <select id="AcademicInterest1" name="AcademicInterest1">
	            <option value=""></option>
				<option value="P0000_0005">Accounting</option>
				<option value="P0000_0010">Actuarial Science Mathematics</option>
				<option value="P0000_0015">Advertising</option>
				<option value="P0000_0030">Agricultural and Food Systems</option>
				<option value="P0000_0035">Agricultural Biotechnology</option>
				<option value="P0000_0040">Agricultural Economics</option>
				<option value="P0000_0045">Agricultural Education</option>
				<option value="P0000_0025">Agricultural Technology and Production Management</option>
				<option value="P0000_0020">Agriculture and Food Business Economics</option>
				<option value="P0000_0050">Agriculture and Food Security</option>
				<option value="P0000_0055">Animal Science Management</option>
				<option value="P0000_0060">Animal Science, Pre-Veterinary Medicine</option>
				<option value="P0000_0065">Animal Sciences</option>
				<option value="P0000_0070">Anthropology</option>
				<option value="P0000_0075">Apparel Design</option>
				<option value="P0000_0085">Apparel Merchandising</option>
				<option value="P0000_0080">Apparel, Merchandising, Design and Textiles</option>
				<option value="P0000_0090">Applied Intercultural Communication</option>
				<option value="P0000_0970">Applied Mathematics</option>
				<option value="P0000_0095">Architectural Studies</option>
				<option value="P0000_0100">Art</option>
				<option value="P0000_0105">Art History</option>
				<option value="P0000_0110">Asian Studies</option>
				<option value="P0000_0115">Astrophysics</option>
				<option value="P0000_0120">Athletic Training</option>
				<option value="P0000_0125">Basic Medical Sciences</option>
				<option value="P0000_0130">Biochemistry/Biophysics</option>
				<option value="P0000_0135">Bioengineering</option>
				<option value="P0000_0140">Bioengineering Pre-Med</option>
				<option value="P0000_0150">Biological Sciences</option>
				<option value="P0000_0145">Biological Sciences, Teaching</option>
				<option value="P0000_0155">Biology</option>
				<option value="P0000_0160">Biology Teaching</option>
				<option value="P0000_0165">Biophysics/Physics</option>
				<option value="P0000_0170">Botany</option>
				<option value="P0000_0175">Broadcast News</option>
				<option value="P0000_0180">Broadcast Production</option>
				<option value="P0000_0185">Business</option>
				<option value="P0000_9000">Business Certification Check</option>
				<option value="P0000_0190">Business Economics (Economics)</option>
				<option value="P0000_D000">CACD - Deficient</option>
				<option value="P0000_I000">CACD - Inactive</option>
				<option value="P0000_0195">Chemical Engineering</option>
				<option value="P0000_0200">Chemical Engineering Pre-Med</option>
				<option value="P0000_0205">Chemistry</option>
				<option value="P0000_0975">Chemistry Teaching</option>
				<option value="P0000_0210">Chinese</option>
				<option value="P0000_0215">Chinese Teaching</option>
				<option value="P0000_0220">Civil Engineering</option>
				<option value="P0000_0225">Communication</option>
				<option value="P0000_0226">Communication and Society</option>
				<option value="P0000_0955">Communication Technology</option>
				<option value="P0000_0230">Comparative Ethnic Studies</option>
				<option value="P0000_0235">Computational Mathematics</option>
				<option value="P0000_0240">Computational Neuroscience</option>
				<option value="P0000_0245">Computational Physics</option>
				<option value="P0000_0250">Computer Engineering</option>
				<option value="P0000_0255">Computer Science (BA)</option>
				<option value="P0000_0260">Computer Science (BS)</option>
				<option value="P0000_0265">Construction Management</option>
				<option value="P0000_0270">Continuum Physics</option>
				<option value="P0000_0275">Creative Writing</option>
				<option value="P0000_0280">Criminal Justice</option>
				<option value="P0000_0285">Digital Technology and Culture</option>
				<option value="P0000_0930">Earth Sciences</option>
				<option value="P0000_0290">Ecology/Evolutionary Biology</option>
				<option value="P0000_0295">Economic Analysis and Policy</option>
				<option value="P0000_0980">Economic Development</option>
				<option value="P0000_0300">Economic Sciences</option>
				<option value="P0000_0945">Economics, Policy, and Law</option>
				<option value="P0000_0305">Education</option>
				<option value="P0000_0310">Electrical Engineering</option>
				<option value="P0000_0315">Elementary Education</option>
				<option value="P0000_0320">Engineering</option>
				<option value="P0000_0325">English</option>
				<option value="P0000_0330">English Teaching/Language Arts</option>
				<option value="P0000_0335">Entomology (Biology)</option>
				<option value="P0000_0340">Entrepreneurship</option>
				<option value="P0000_0935">Environmental and Ecosystem Sciences</option>
				<option value="P0000_0345">Environmental and Resource Economics</option>
				<option value="P0000_0350">Environmental Engineering</option>
				<option value="P0000_0355">Environmental Physics</option>
				<option value="P0000_0360">Environmental Science</option>
				<option value="P0000_0940">Exploring</option>
				<option value="P0000_0365">Family and Consumer Sciences</option>
				<option value="P0000_0370">Field Crop Management</option>
				<option value="P0000_0375">Finance</option>
				<option value="P0000_0380">Financial Markets (Economics)</option>
				<option value="P0000_0385">Fine Arts</option>
				<option value="P0000_0390">Food Science</option>
				<option value="P0000_0395">Foreign Languages and Cultures</option>
				<option value="P0000_0400">French</option>
				<option value="P0000_0405">French Teaching</option>
				<option value="P0000_0410">Fruit  Management</option>
				<option value="P0000_0415">Genetics and Cell Biology</option>
				<option value="P0000_0420">Geology</option>
				<option value="P0000_0425">Global Politics</option>
				<option value="P0000_0430">Health and Fitness</option>
				<option value="P0000_0435">History</option>
				<option value="P0000_0440">History Pre-Law</option>
				<option value="P0000_0445">History Teaching</option>
				<option value="P0000_0450">Hospitality Business Management</option>
				<option value="P0000_0455">Human Development</option>
				<option value="P0000_0460">Humanities (General Studies)</option>
				<option value="P0000_0950">Integrated Communication</option>
				<option value="P0000_0465">Integrated Plant Sciences</option>
				<option value="P0000_0470">Interior Design</option>
				<option value="P0000_0475">International Area Studies</option>
				<option value="P0000_0480">International Business</option>
				<option value="P0000_0485">International Trade</option>
				<option value="P0000_0490">Jazz Studies</option>
				<option value="P0000_0495">Journalism</option>
				<option value="P0000_0498">Journalism &amp; Media Production</option>
				<option value="P0000_0500">Landscape Architecture</option>
				<option value="P0000_0505">Landscape Design  (IPS)</option>
				<option value="P0000_0510">Landscape Nurse Mgt</option>
				<option value="P0000_0515">Linguistics (General Studies)</option>
				<option value="P0000_0520">Literary Studies</option>
				<option value="P0000_0525">Management and Operations</option>
				<option value="P0000_0530">Management Information Systems</option>
				<option value="P0000_0535">Marketing</option>
				<option value="P0000_0540">Materials Chemistry</option>
				<option value="P0000_0545">Materials Physics</option>
				<option value="P0000_0550">Materials Science and Engineer</option>
				<option value="P0000_0555">Mathematical Modeling</option>
				<option value="P0000_0560">Mathematical Physics</option>
				<option value="P0000_0565">Mathematics</option>
				<option value="P0000_0570">Mathematics (General Studies)</option>
				<option value="P0000_0580">Mathematics Teaching (Gen St)</option>
				<option value="P0000_0585">Mechanical Engineering</option>
				<option value="P0000_0590">Medical Technology</option>
				<option value="P0000_0595">Microbiology</option>
				<option value="P0000_0600">Molecular Biology</option>
				<option value="P0000_0605">Movement Studies</option>
				<option value="P0000_0965">Multimedia Journalism</option>
				<option value="P0000_0610">Music</option>
				<option value="P0000_0615">Music Brass Perc Strings Winds</option>
				<option value="P0000_0620">Music Composition</option>
				<option value="P0000_0630">Music Keyboard Pedagogy</option>
				<option value="P0000_0635">Music Performance</option>
				<option value="P0000_0640">Music Teaching</option>
				<option value="P0000_0645">Music: Keyboard</option>
				<option value="P0000_0650">Music: Voice</option>
				<option value="P0000_0655">Nanotechnology</option>
				<option value="P0000_0660">Natural Resource Policy</option>
				<option value="P0000_0665">Natural Resource Sciences</option>
				<option value="P0000_0670">Neuroscience</option>
				<option value="P0000_0675">Neuroscience Pre-Med</option>
				<option value="P0000_0680">Neuroscience Pre-Veterinary Medicine</option>
				<option value="P0000_0685">Nursing</option>
				<option value="P0000_0690">Nutrition and Exercise Physiology</option>
				<option value="P0000_0695">Operations Research</option>
				<option value="P0000_0700">Optics and Electronics</option>
				<option value="P0000_0705">Organic Agricultural Systems</option>
				<option value="P0000_0710">Organizational Communication</option>
				<option value="P0000_0715">Philosophy</option>
				<option value="P0000_0720">Philosophy Pre-Law</option>
				<option value="P0000_0725">Physical Science Teaching</option>
				<option value="P0000_0730">Physical Sciences</option>
				<option value="P0000_0735">Physics</option>
				<option value="P0000_0740">Physics Education</option>
				<option value="P0000_0745">Political Science</option>
				<option value="P0000_0750">Political Science Pre-Law</option>
				<option value="P0000_0755">Pre-Dentistry</option>
				<option value="P0000_0760">Pre-Law</option>
				<option value="P0000_0765">Pre-Medicine</option>
				<option value="P0000_0770">Pre-Occupational Therapy</option>
				<option value="P0000_0775">Pre-Optometry</option>
				<option value="P0000_0780">Pre-Pharmacy</option>
				<option value="P0000_0785">Pre-Physical Therapy</option>
				<option value="P0000_0790">Pre-Physician's Assistant</option>
				<option value="P0000_0795">Pre-Veterinary Medicine</option>
				<option value="P0000_0990">Professional Chemistry</option>
				<option value="P0000_0800">Psychology</option>
				<option value="P0000_0805">Public Relations</option>
				<option value="P0000_0985">Quantitative Economics</option>
				<option value="P0000_0810">Religious Studies (Gen St)</option>
				<option value="P0000_0815">Rhetoric  Writing</option>
				<option value="P0000_0960">Science Communication</option>
				<option value="P0000_0820">Science Teaching</option>
				<option value="P0000_0825">Social Sciences (Gen St)</option>
				<option value="P0000_0830">Social Studies</option>
				<option value="P0000_0835">Sociology</option>
				<option value="P0000_0840">Spanish</option>
				<option value="P0000_0845">Spanish Teaching</option>
				<option value="P0000_0850">Speech and Hearing Sciences</option>
				<option value="P0000_0855">Sport Management</option>
				<option value="P0000_0920">Sport Science</option>
				<option value="P0000_0857">Strategic Communication</option>
				<option value="P0000_0995">Studio Fine Arts</option>
				<option value="P0000_0860">Theoretical Mathematics</option>
				<option value="P0000_0865">Turfgrass Management</option>
				<option value="P0000_0870">Undecided</option>
				<option value="P0000_0875">Viticulture  (IPS)</option>
				<option value="P0000_0880">Wetland Aquatic Resources</option>
				<option value="P0000_0885">Wildlife Ecology</option>
				<option value="P0000_0925">Wildlife Ecology and Conservation</option>
				<option value="P0000_0890">Wildlife Ecology Pre-Vet Sci</option>
				<option value="P0000_0895">Wine Business Management (HBM)</option>
				<option value="P0000_0900">Women's Studies</option>
				<option value="P0000_0905">Zoology</option>
				<option value="P0000_0910">Zoology Pre-Med/ Pre-Dental</option>
				<option value="P0000_0915">Zoology Pre-Veterinary Medicine</option>
			</select>
    
		<!-- 2nd Academic Interest -->
        <label>2nd Academic Interest</label>
        <select id="AcademicInterest2" name="AcademicInterest2">
        <option value=""></option>
		<option value="P0000_0005">Accounting</option>
		<option value="P0000_0010">Actuarial Science Mathematics</option>
		<option value="P0000_0015">Advertising</option>
		<option value="P0000_0030">Agricultural and Food Systems</option>
		<option value="P0000_0035">Agricultural Biotechnology</option>
		<option value="P0000_0040">Agricultural Economics</option>
		<option value="P0000_0045">Agricultural Education</option>
		<option value="P0000_0025">Agricultural Technology and Production Management</option>
		<option value="P0000_0020">Agriculture and Food Business Economics</option>
		<option value="P0000_0050">Agriculture and Food Security</option>
		<option value="P0000_0055">Animal Science Management</option>
		<option value="P0000_0060">Animal Science, Pre-Veterinary Medicine</option>
		<option value="P0000_0065">Animal Sciences</option>
		<option value="P0000_0070">Anthropology</option>
		<option value="P0000_0075">Apparel Design</option>
		<option value="P0000_0085">Apparel Merchandising</option>
		<option value="P0000_0080">Apparel, Merchandising, Design and Textiles</option>
		<option value="P0000_0090">Applied Intercultural Communication</option>
		<option value="P0000_0970">Applied Mathematics</option>
		<option value="P0000_0095">Architectural Studies</option>
		<option value="P0000_0100">Art</option>
		<option value="P0000_0105">Art History</option>
		<option value="P0000_0110">Asian Studies</option>
		<option value="P0000_0115">Astrophysics</option>
		<option value="P0000_0120">Athletic Training</option>
		<option value="P0000_0125">Basic Medical Sciences</option>
		<option value="P0000_0130">Biochemistry/Biophysics</option>
		<option value="P0000_0135">Bioengineering</option>
		<option value="P0000_0140">Bioengineering Pre-Med</option>
		<option value="P0000_0150">Biological Sciences</option>
		<option value="P0000_0145">Biological Sciences, Teaching</option>
		<option value="P0000_0155">Biology</option>
		<option value="P0000_0160">Biology Teaching</option>
		<option value="P0000_0165">Biophysics/Physics</option>
		<option value="P0000_0170">Botany</option>
		<option value="P0000_0175">Broadcast News</option>
		<option value="P0000_0180">Broadcast Production</option>
		<option value="P0000_0185">Business</option>
		<option value="P0000_9000">Business Certification Check</option>
		<option value="P0000_0190">Business Economics (Economics)</option>
		<option value="P0000_D000">CACD - Deficient</option>
		<option value="P0000_I000">CACD - Inactive</option>
		<option value="P0000_0195">Chemical Engineering</option>
		<option value="P0000_0200">Chemical Engineering Pre-Med</option>
		<option value="P0000_0205">Chemistry</option>
		<option value="P0000_0975">Chemistry Teaching</option>
		<option value="P0000_0210">Chinese</option>
		<option value="P0000_0215">Chinese Teaching</option>
		<option value="P0000_0220">Civil Engineering</option>
		<option value="P0000_0225">Communication</option>
		<option value="P0000_0226">Communication and Society</option>
		<option value="P0000_0955">Communication Technology</option>
		<option value="P0000_0230">Comparative Ethnic Studies</option>
		<option value="P0000_0235">Computational Mathematics</option>
		<option value="P0000_0240">Computational Neuroscience</option>
		<option value="P0000_0245">Computational Physics</option>
		<option value="P0000_0250">Computer Engineering</option>
		<option value="P0000_0255">Computer Science (BA)</option>
		<option value="P0000_0260">Computer Science (BS)</option>
		<option value="P0000_0265">Construction Management</option>
		<option value="P0000_0270">Continuum Physics</option>
		<option value="P0000_0275">Creative Writing</option>
		<option value="P0000_0280">Criminal Justice</option>
		<option value="P0000_0285">Digital Technology and Culture</option>
		<option value="P0000_0930">Earth Sciences</option>
		<option value="P0000_0290">Ecology/Evolutionary Biology</option>
		<option value="P0000_0295">Economic Analysis and Policy</option>
		<option value="P0000_0980">Economic Development</option>
		<option value="P0000_0300">Economic Sciences</option>
		<option value="P0000_0945">Economics, Policy, and Law</option>
		<option value="P0000_0305">Education</option>
		<option value="P0000_0310">Electrical Engineering</option>
		<option value="P0000_0315">Elementary Education</option>
		<option value="P0000_0320">Engineering</option>
		<option value="P0000_0325">English</option>
		<option value="P0000_0330">English Teaching/Language Arts</option>
		<option value="P0000_0335">Entomology (Biology)</option>
		<option value="P0000_0340">Entrepreneurship</option>
		<option value="P0000_0935">Environmental and Ecosystem Sciences</option>
		<option value="P0000_0345">Environmental and Resource Economics</option>
		<option value="P0000_0350">Environmental Engineering</option>
		<option value="P0000_0355">Environmental Physics</option>
		<option value="P0000_0360">Environmental Science</option>
		<option value="P0000_0940">Exploring</option>
		<option value="P0000_0365">Family and Consumer Sciences</option>
		<option value="P0000_0370">Field Crop Management</option>
		<option value="P0000_0375">Finance</option>
		<option value="P0000_0380">Financial Markets (Economics)</option>
		<option value="P0000_0385">Fine Arts</option>
		<option value="P0000_0390">Food Science</option>
		<option value="P0000_0395">Foreign Languages and Cultures</option>
		<option value="P0000_0400">French</option>
		<option value="P0000_0405">French Teaching</option>
		<option value="P0000_0410">Fruit  Management</option>
		<option value="P0000_0415">Genetics and Cell Biology</option>
		<option value="P0000_0420">Geology</option>
		<option value="P0000_0425">Global Politics</option>
		<option value="P0000_0430">Health and Fitness</option>
		<option value="P0000_0435">History</option>
		<option value="P0000_0440">History Pre-Law</option>
		<option value="P0000_0445">History Teaching</option>
		<option value="P0000_0450">Hospitality Business Management</option>
		<option value="P0000_0455">Human Development</option>
		<option value="P0000_0460">Humanities (General Studies)</option>
		<option value="P0000_0950">Integrated Communication</option>
		<option value="P0000_0465">Integrated Plant Sciences</option>
		<option value="P0000_0470">Interior Design</option>
		<option value="P0000_0475">International Area Studies</option>
		<option value="P0000_0480">International Business</option>
		<option value="P0000_0485">International Trade</option>
		<option value="P0000_0490">Jazz Studies</option>
		<option value="P0000_0495">Journalism</option>
		<option value="P0000_0498">Journalism &amp; Media Production</option>
		<option value="P0000_0500">Landscape Architecture</option>
		<option value="P0000_0505">Landscape Design  (IPS)</option>
		<option value="P0000_0510">Landscape Nurse Mgt</option>
		<option value="P0000_0515">Linguistics (General Studies)</option>
		<option value="P0000_0520">Literary Studies</option>
		<option value="P0000_0525">Management and Operations</option>
		<option value="P0000_0530">Management Information Systems</option>
		<option value="P0000_0535">Marketing</option>
		<option value="P0000_0540">Materials Chemistry</option>
		<option value="P0000_0545">Materials Physics</option>
		<option value="P0000_0550">Materials Science and Engineer</option>
		<option value="P0000_0555">Mathematical Modeling</option>
		<option value="P0000_0560">Mathematical Physics</option>
		<option value="P0000_0565">Mathematics</option>
		<option value="P0000_0570">Mathematics (General Studies)</option>
		<option value="P0000_0580">Mathematics Teaching (Gen St)</option>
		<option value="P0000_0585">Mechanical Engineering</option>
		<option value="P0000_0590">Medical Technology</option>
		<option value="P0000_0595">Microbiology</option>
		<option value="P0000_0600">Molecular Biology</option>
		<option value="P0000_0605">Movement Studies</option>
		<option value="P0000_0965">Multimedia Journalism</option>
		<option value="P0000_0610">Music</option>
		<option value="P0000_0615">Music Brass Perc Strings Winds</option>
		<option value="P0000_0620">Music Composition</option>
		<option value="P0000_0630">Music Keyboard Pedagogy</option>
		<option value="P0000_0635">Music Performance</option>
		<option value="P0000_0640">Music Teaching</option>
		<option value="P0000_0645">Music: Keyboard</option>
		<option value="P0000_0650">Music: Voice</option>
		<option value="P0000_0655">Nanotechnology</option>
		<option value="P0000_0660">Natural Resource Policy</option>
		<option value="P0000_0665">Natural Resource Sciences</option>
		<option value="P0000_0670">Neuroscience</option>
		<option value="P0000_0675">Neuroscience Pre-Med</option>
		<option value="P0000_0680">Neuroscience Pre-Veterinary Medicine</option>
		<option value="P0000_0685">Nursing</option>
		<option value="P0000_0690">Nutrition and Exercise Physiology</option>
		<option value="P0000_0695">Operations Research</option>
		<option value="P0000_0700">Optics and Electronics</option>
		<option value="P0000_0705">Organic Agricultural Systems</option>
		<option value="P0000_0710">Organizational Communication</option>
		<option value="P0000_0715">Philosophy</option>
		<option value="P0000_0720">Philosophy Pre-Law</option>
		<option value="P0000_0725">Physical Science Teaching</option>
		<option value="P0000_0730">Physical Sciences</option>
		<option value="P0000_0735">Physics</option>
		<option value="P0000_0740">Physics Education</option>
		<option value="P0000_0745">Political Science</option>
		<option value="P0000_0750">Political Science Pre-Law</option>
		<option value="P0000_0755">Pre-Dentistry</option>
		<option value="P0000_0760">Pre-Law</option>
		<option value="P0000_0765">Pre-Medicine</option>
		<option value="P0000_0770">Pre-Occupational Therapy</option>
		<option value="P0000_0775">Pre-Optometry</option>
		<option value="P0000_0780">Pre-Pharmacy</option>
		<option value="P0000_0785">Pre-Physical Therapy</option>
		<option value="P0000_0790">Pre-Physician's Assistant</option>
		<option value="P0000_0795">Pre-Veterinary Medicine</option>
		<option value="P0000_0990">Professional Chemistry</option>
		<option value="P0000_0800">Psychology</option>
		<option value="P0000_0805">Public Relations</option>
		<option value="P0000_0985">Quantitative Economics</option>
		<option value="P0000_0810">Religious Studies (Gen St)</option>
		<option value="P0000_0815">Rhetoric  Writing</option>
		<option value="P0000_0960">Science Communication</option>
		<option value="P0000_0820">Science Teaching</option>
		<option value="P0000_0825">Social Sciences (Gen St)</option>
		<option value="P0000_0830">Social Studies</option>
		<option value="P0000_0835">Sociology</option>
		<option value="P0000_0840">Spanish</option>
		<option value="P0000_0845">Spanish Teaching</option>
		<option value="P0000_0850">Speech and Hearing Sciences</option>
		<option value="P0000_0855">Sport Management</option>
		<option value="P0000_0920">Sport Science</option>
		<option value="P0000_0857">Strategic Communication</option>
		<option value="P0000_0995">Studio Fine Arts</option>
		<option value="P0000_0860">Theoretical Mathematics</option>
		<option value="P0000_0865">Turfgrass Management</option>
		<option value="P0000_0870">Undecided</option>
		<option value="P0000_0875">Viticulture  (IPS)</option>
		<option value="P0000_0880">Wetland Aquatic Resources</option>
		<option value="P0000_0885">Wildlife Ecology</option>
		<option value="P0000_0925">Wildlife Ecology and Conservation</option>
		<option value="P0000_0890">Wildlife Ecology Pre-Vet Sci</option>
		<option value="P0000_0895">Wine Business Management (HBM)</option>
		<option value="P0000_0900">Women's Studies</option>
		<option value="P0000_0905">Zoology</option>
		<option value="P0000_0910">Zoology Pre-Med/ Pre-Dental</option>
		<option value="P0000_0915">Zoology Pre-Veterinary Medicine</option>
		</select>

    </fieldset>

   <input type="submit" value="Submit">


</form>