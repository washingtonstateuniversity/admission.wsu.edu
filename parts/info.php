<script>
(function($){
	
	function showState() {
		
		if ( $("#Country").val() == "USA" ) {
			$("#State").removeClass("hidden");
		};
		
	}
	
	$(document).ready( function() {
		
		$("#disclose-additional").on("click", function() {
			$("#additional-info").toggleClass("closed");
		});
		
		$("#PhoneType").on("change", function() {
			if ( $("#PhoneType").val() == "Mobile" ) {
				$("#MobileProvider,#OkayToText").removeClass("hidden");
			} else {
				$("#MobileProvider,#OkayToText").addClass("hidden");
			}
		});
		
		showState();
		
		$("#Country").on("change", function() {
			showState();
		});
		
		$("#info input[type=text], #info select").each( function() {
			
			var name = $(this).attr("name");
			var stored_value = JSON.parse(sessionStorage.getItem(name));
			if ( stored_value != "" ) {
				$(this).val(stored_value);
			}
			
		}).change( function() {
			
			var name = $(this).attr("name");
			var value = $(this).val();
			sessionStorage.setItem(name, JSON.stringify(value));
			
		});
		
	});
})(jQuery);
</script>


<p>Tell us a bit about yourself so we can send you the right information. (Lighter fields are required.)</p>

<form action="https://goto.wsu.edu/Info" id="InfoRequestForm" method="post">
	       
	<fieldset>
	   	
	   	<legend>Name</legend>
		
	    <label class="hidden">Legal First Name *</label>
	    <input class="required" id="FirstName" name="FirstName" type="text" value="" placeholder="Legal First Name (Required)" required>

	    <label class="hidden">Middle Name</label>
	    <input id="MiddleName" name="MiddleName" type="text" value="" placeholder="Middle Name">

	    <label class="hidden">Last Name</label>
	    <input class="required" id="LastName" name="LastName" type="text" value="" placeholder="Last Name" required>
		
	</fieldset>

	<fieldset>
		
		<legend>Email</legend>
	
	    <label for="Email" class="hidden">Email</label>
	    <input class="required" id="Email" name="Email" type="text" value="" placeholder="Email Address" required>
	            
	</fieldset>
	    
	<fieldset id="address" class="address">
		
		<legend>Address</legend>
		
		
		
		<!-- Country Select -->
	    <label for="Country" class="hidden">Country</label>
	    
	    <select class="required" id="Country" name="Country" required>
		    
		    <option value="" selected>Select Country</option>
		    <?php
		    
		    $countries_array = wp_remote_get( "https://goto.wsu.edu/api/data/Countries", array( 'headers' => array( 'Accept' => 'application/json' ) ) ); 
		    $countries = json_decode($countries_array["body"], true);
		    foreach ($countries as $country) {
			    echo '<option value="'.$country["Value"].'">'.$country["Label"].'</option>';
			}
		    
		    ?>

		</select>
	
	    <label class="hidden">Mailing Address Line 1 *</label>
	    <input class="required" id="Address1" name="Address1" type="text" value="" placeholder="Mailing Address (Line One)">
		    
		<label class="hidden">Mailing Address Line 2</label>
		<input id="Address2" name="Address2" type="text" value="" placeholder="Mailing Address (Line Two)">
	
	    <label class="hidden">City *</label>
	    <input class="required" id="City" name="City" type="text" value="" placeholder="City" required>
	
	    <!-- Select State -->
	    <label class="hidden">State</label>
	    <select id="State" class="required hidden" name="State" required>
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
			
		<!-- ZIP -->
	    <label for="ZipCode" class="hidden">ZIP Code *</label>
	    <input class="required" id="ZipCode" maxlength="10" name="ZipCode" type="text" value="" placeholder="ZIP Code">
	
	</fieldset>
	
	<!-- Phone -->
	<fieldset>
		
		<legend>Phone</legend>
		
        <label class="hidden">Phone * (10-digit phone number with area code)</label>
        <input class="required" id="Phone" name="Phone" type="text" value="" placeholder="Phone Number (10-digit phone number with area code)">
   
        <label>Phone Type</label>
        <select class="SelectMobilePhone required" id="PhoneType" name="PhoneType">
            <option value="" selected>Select</option>
            <option value="Mobile">Mobile</option>
			<option value="Home">Home</option>
			<option value="Other">Other</option>
		</select>

        <label class="hidden">Mobile Phone Service</label>
        <select id="MobileProvider" name="MobileProvider" class="required hidden">
	        <option value="" selected>Select Carrier</option>
	        <option value="Airtel">Airtel</option>
			<option value="CBeyond">C Beyond</option>
			<option value="Cellcom">Cellcom</option>
			<option value="CSpire">C Spire</option>
			<option value="USCellular">US Cellular</option>
			<option value="InlandCellular">Inland Cellular</option>
			<option value="Iwireless">I wireless</option>
			<option value="Alltel">Alltel</option>
			<option value="Sprint">Sprint</option>
			<option value="Cricket">Cricket</option>
			<option value="GCI">GCI</option>
			<option value="Cingular">Cingular</option>
			<option value="AlaskaCommunications">Alaska Communications</option>
			<option value="BoostMobile">Boost Mobile</option>
			<option value="MetroPCS">MetroPCS</option>
			<option value="ChoiceWireless">Choice Wireless</option>
			<option value="Cleartalk">Cleartalk</option>
			<option value="SimpleMobile">Simple Mobile</option>
			<option value="T-Mobile">T-Mobile</option>
			<option value="AT&amp;T">AT&amp;T</option>
			<option value="VirginMobile">Virgin Mobile</option>
			<option value="Vodafone">Vodafone</option>
			<option value="VerizonWireless">Verizon Wireless</option>
			<option value="Other">Other</option>
		</select>
				
        <label class="hidden">Okay to text important deadline reminders? *</label>
        <select id="OkayToText" name="OkayToText" class="required hidden">
            <option value="">Okay to text reminders?</option>
			<option value="YES">Yes</option>
			<option value="NO">No</option>
		</select>
	
	</fieldset>
	
	<!-- ABOUT YOU -->
	<!--<header>About You</header>-->

	<!-- Birthday -->
	<fieldset class="birthday">
	
        <label>Birthdate</label><br>
	    <select class="required" id="DateOfBirthMonth" name="DateOfBirthMonth">
			<option value="">Month</option>
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
		<select class="required" id="DateOfBirthDay" name="DateOfBirthDay">
		    <option value="">Day</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
		</select>
		<select class="required" id="DateOfBirthYear" name="DateOfBirthYear">
		    <option value="">Year</option>
			<option value="2005">2005</option>
			<option value="2004">2004</option>
			<option value="2003">2003</option>
			<option value="2002">2002</option>
			<option value="2001">2001</option>
			<option value="2000">2000</option>
			<option value="1999">1999</option>
			<option value="1998">1998</option>
			<option value="1997">1997</option>
			<option value="1996">1996</option>
			<option value="1995">1995</option>
			<option value="1994">1994</option>
			<option value="1993">1993</option>
			<option value="1992">1992</option>
			<option value="1991">1991</option>
			<option value="1990">1990</option>
			<option value="1989">1989</option>
			<option value="1988">1988</option>
			<option value="1987">1987</option>
			<option value="1986">1986</option>
			<option value="1985">1985</option>
			<option value="1984">1984</option>
			<option value="1983">1983</option>
			<option value="1982">1982</option>
			<option value="1981">1981</option>
			<option value="1980">1980</option>
			<option value="1979">1979</option>
			<option value="1978">1978</option>
			<option value="1977">1977</option>
			<option value="1976">1976</option>
			<option value="1975">1975</option>
			<option value="1974">1974</option>
			<option value="1973">1973</option>
			<option value="1972">1972</option>
			<option value="1971">1971</option>
			<option value="1970">1970</option>
			<option value="1969">1969</option>
			<option value="1968">1968</option>
			<option value="1967">1967</option>
			<option value="1966">1966</option>
			<option value="1965">1965</option>
			<option value="1964">1964</option>
			<option value="1963">1963</option>
			<option value="1962">1962</option>
			<option value="1961">1961</option>
			<option value="1960">1960</option>
			<option value="1959">1959</option>
			<option value="1958">1958</option>
			<option value="1957">1957</option>
			<option value="1956">1956</option>
			<option value="1955">1955</option>
			<option value="1954">1954</option>
			<option value="1953">1953</option>
			<option value="1952">1952</option>
			<option value="1951">1951</option>
			<option value="1950">1950</option>
			<option value="1949">1949</option>
			<option value="1948">1948</option>
			<option value="1947">1947</option>
			<option value="1946">1946</option>
			<option value="1945">1945</option>
			<option value="1944">1944</option>
			<option value="1943">1943</option>
			<option value="1942">1942</option>
			<option value="1941">1941</option>
			<option value="1940">1940</option>
		</select>
	    
	</fieldset>
	
	<!-- Student Plans -->
	<fieldset class="plans">
	
		<legend>Your Plans</legend>
				
	    <label class="hidden">Anticipated Start Term *</label>
	    <select class="required" id="AnticipatedStartTerm" name="AnticipatedStartTerm">
	        <option value="">When do you plan to start?</option>
			<option value="2153">2015 Spring</option>
			<option value="2155">2015 Summer</option>
			<option value="2157">2015 Fall</option>
			<option value="2163">2016 Spring</option>
			<option value="2165">2016 Summer</option>
			<option value="2167">2016 Fall</option>
			<option value="2173">2017 Spring</option>
			<option value="2175">2017 Summer</option>
			<option value="2177">2017 Fall</option>
			<option value="2183">2018 Spring</option>
			<option value="2185">2018 Summer</option>
			<option value="2187">2018 Fall</option>
			<option value="2193">2019 Spring</option>
			<option value="2195">2019 Summer</option>
			<option value="2197">2019 Fall</option>
			<option value="2203">2020 Spring</option>
			<option value="2205">2020 Summer</option>
			<option value="2207">2020 Fall</option>
			<option value="2213">2021 Spring</option>
			<option value="2215">2021 Summer</option>
			<option value="2217">2021 Fall</option>
			<option value="2223">2022 Spring</option>
			<option value="2225">2022 Summer</option>
			<option value="2227">2022 Fall</option>
			<option value="2233">2023 Spring</option>
			<option value="2235">2023 Summer</option>
			<option value="2237">2023 Fall</option>
			<option value="2243">2024 Spring</option>
			<option value="2245">2024 Summer</option>
			<option value="2247">2024 Fall</option>
			<option value="2253">2025 Spring</option>
			<option value="2255">2025 Summer</option>
			<option value="2257">2025 Fall</option>
			<option value="2263">2026 Spring</option>
			<option value="2265">2026 Summer</option>
			<option value="2267">2026 Fall</option>
			<option value="2273">2027 Spring</option>
			<option value="2275">2027 Summer</option>
			<option value="2277">2027 Fall</option>
			<option value="2283">2028 Spring</option>
			<option value="2285">2028 Summer</option>
			<option value="2287">2028 Fall</option>
			<option value="2293">2029 Spring</option>
			<option value="2295">2029 Summer</option>
			<option value="2297">2029 Fall</option>
			<option value="2303">2030 Spring</option>
			<option value="2305">2030 Summer</option>
			<option value="2307">2030 Fall</option>
		</select>
	
	    <label class="hidden">Entering as a ...</label>
	    <select class="required" id="AnticipatedStartTerm" name="EnteringAs">
	        <option value="">Entering as a ...</option>
			<option value="TRD">Freshman</option>
			<option value="TRN">Transfer Student</option>
			<option value="NDG">Non-degree seeking student</option>
			<option value="FSR">Former WSU student who is returning</option>
		</select>
	        
	</fieldset>
	
	<hr>

    <button id="disclose-additional" class="secondary" type="submit" onclick="">Tell us more</button>
    
    <span>or</span>
    
    <input type="submit" value="Submit Basic Info Only" />
    
	<input id="ExpandAdditionalInfo" name="ExpandAdditionalInfo" type="hidden" value="" />
    
</form>