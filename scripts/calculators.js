/* jshint unused:false */

(function($){
	
function checkScore(metric,score) {
	
	var low = 0;
	var high = 0;
	
	if ( metric === "gpa" ) { high = 4.0; low = 2.5; }
	if ( metric === "reading" || metric === "math" ) { high = 800; low = 200; }
	if ( metric === "act" ) { high = 36; low = 11; }

	if (score) {
		
		if ( score < low || score > high ) {

			$("#correction-"+metric).show();
			
		} else {
			
			$("#correction-"+metric).hide();

		}
		
	} else {
		
		$("#correction-"+metric).hide();
		
	}

}

function calculate() {
	if (document.getElementById("gpa").value && ((document.getElementById("reading").value && document.getElementById("math").value) || document.getElementById("act").value)) {
		var gpa = document.getElementById("gpa").value.valueOf() * 400;
		var sat = parseFloat(document.getElementById("reading").value) + parseFloat(document.getElementById("math").value) + gpa.valueOf();
		var act = document.getElementById("act").value.valueOf();
		var qvalue = sat;
		
		switch(act) {
			case "36":
				act = 1600;
				break;
			case "35":
				act = 1580;
				break;
			case "34":
				act = 1520;
				break;
			case "33":
				act = 1470;
				break;
			case "32":
				act = 1420;
				break;
			case "31":
				act = 1380;
				break;
			case "30":
				act = 1340;
				break;
			case "29":
				act = 1300;
				break;
			case "28":
				act = 1260;
				break;
			case "27":
				act = 1220;
				break;
			case "26":
				act = 1180;
				break;
			case "25":
				act = 1140;
				break;
			case "24":
				act = 1110;
				break;
			case "23":
				act = 1070;
				break;
			case "22":
				act = 1030;
				break;
			case "21":
				act = 990;
				break;
			case "20":
				act = 950;
				break;
			case "19":
				act = 910;
				break;
			case "18":
				act = 870;
				break;
			case "17":
				act = 830;
				break;
			case "16":
				act = 780;
				break;
			case "15":
				act = 740;
				break;
			case "14":
				act = 680;
				break;
			case "13":
				act = 620;
				break;
			case "12":
				act = 560;
				break;
			case "11":
				act = 500;
				break;
			default:
				break;
				
		}
		
		if ((parseFloat(act) + parseFloat(gpa)) > sat) {
			qvalue = parseFloat(act) + parseFloat(gpa);
		}

		// University Achievement Award
		if ( $("#calculator").hasClass("UAA") ) {
			
			if ( qvalue >= 2750 ) {
				document.getElementById("awardlevel").innerHTML = "<h2>Congratulations!</h2><h3>You are eligible for $4000.</h3><p>Your strong academic record may also qualify you for additional awards from the University's 700-plus scholarship programs. If you haven't already done so, please  apply for  <a href=\"http://admission.wsu.edu/applications/apply.html#scholarships\">admission and scholarships</a>.</p>";
			} else if ( qvalue >= 2400 ) {
				document.getElementById("awardlevel").innerHTML = "<h2>Congratulations!</h2><h3>You are eligible for $2000.</h3><p>Your good academic record may also qualify you for additional awards from the University's 700-plus scholarship programs. If you haven't already done so, please  apply for  <a href=\"http://admission.wsu.edu/applications/apply.html#scholarships\">admission and scholarships</a>.</p>";
			} else if (qvalue < 2400) {
				document.getElementById("awardlevel").innerHTML = "<h2>Based on the scores you provided, you do not qualify for the University Achievement Award.</h2><p>If your scores change, please calculate your eligibility again. You may qualify for other awards from the University's 700-plus scholarship programs. If you haven't already done so, please apply for  <a href=\"http://admission.wsu.edu/applications/apply.html#scholarships\">admission and scholarships</a>.</p>";
			}
		
		// Cougar Achievement Award
		} else if (document.getElementById("calculator").style.class === "CAA") {
			
			if (qvalue >= 2500) {
				document.getElementById("awardlevel").innerHTML = "<h2>Congratulations!</h2> <h3>You are eligible for <strong>$11,000</strong> in your first year, renewable for up to three additional years.</h3> <p>Your strong academic record may also qualify you for additional awards from the University's 700-plus scholarship programs. If you haven't already done so, please apply for  <a href=\"http://admission.wsu.edu/applications/apply.html#scholarships\">admission and scholarships</a>.</p>";
			} else if (qvalue >= 2400) {
				document.getElementById("awardlevel").innerHTML = "<h2>Congratulations!</h2> <h3>You are eligible for <strong>$4000</strong> in your first year, renewable for up to three additional years.</h3> <p>Your good academic record may also qualify you for additional awards from the University's 700-plus scholarship programs. If you haven't already done so, please apply for  <a href=\"http://admission.wsu.edu/applications/apply.html#scholarships\">admission and scholarships</a>.</p>";
			} else if (qvalue < 2400) {
				document.getElementById("awardlevel").innerHTML = "<h2>Based on the scores you provided, you do not qualify for the Cougar Freshman Academic Award.</h2> <p>If your scores change, you may use this calculator again to see if you are eligible. You may qualify for other awards from the University's 700-plus scholarship programs. If you haven't already done so, please apply for  <a href=\"http://admission.wsu.edu/applications/apply.html#scholarships\">admission and scholarships</a>.</p>";
			}
		
		// Cougar Achievement Award
		} else if (document.getElementById("calculator").style.class === "CC") {
			if (qvalue >= 2200) {
				document.getElementById("awardlevel").innerHTML = "<h2>Congratulations!</h2> <p>Your good academic record indicates you're eligible for the Crimson Crew program provided you also: <br>1) Have a college preparatory curriculum <br>2) Positive grade trends <br>3) <a href=\"http://admission.wsu.edu/applications/index.html\">Apply</a> to the WSU Pullman campus</p>";
			} else if (qvalue < 2200) {
				document.getElementById("awardlevel").innerHTML = "<p>Based on the information you provided, it does not appear you're eligible for the Crimson Crew program at this time.</p> <h2>But wait!</h2> <p>That doesn't mean you're not eligible for admission. Discuss further with your admission counselor at <a href=\"http://rep.wsu.edu\">rep.wsu.edu</a>.</p>";
			}
		} else {
			document.getElementById("awardlevel").innerHTML = "";
		}

	}
	
}

	$(document).ready( function() {
					
		$(".gpa input").on("change", function() {
			var score = $(".gpa input").val();
			//alert(gpa);
			checkScore("gpa",score);
		});
		
		/* SAT Scores */
		
		$(".math input").on("change", function() {
			var score = $(".math input").val();
			checkScore("math",score);
		});
		
		$(".reading input").on("change", function() {
			var score = $(".reading input").val();
			checkScore("reading",score);
		});
		
		calculate();
		
	});

})(jQuery);