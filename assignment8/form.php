
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DVD Search Form | Assignment 8</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

	<style>
	.form-check-label {
		padding-top: calc(.5rem - 1px * 2);
		padding-bottom: calc(.5rem - 1px * 2);
		margin-bottom: 0;
	}
</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">DVD Search Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		
				<form action="search.php" method="GET">

					<div class="form-group row">
						<label for="title-id" class="col-sm-3 col-form-label text-sm-right">DVD Title:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="title-id" name="dvd_title">
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
						<div class="col-sm-9">
							<select name="genre" id="genre-id" class="form-control">
								<option value="" selected>-- All --</option>

																	<option value="1">
																		</option>
																	<option value="2">
									Action Adventure									</option>
																	<option value="3">
									Animation									</option>
																	<option value="5">
									Children's/Family									</option>
																	<option value="6">
									Classic									</option>
																	<option value="7">
									Comedy									</option>
																	<option value="8">
									Documentary									</option>
																	<option value="9">
									Drama									</option>
																	<option value="11">
									Foreign									</option>
																	<option value="12">
									Games									</option>
																	<option value="13">
									Horror									</option>
																	<option value="14">
									Karaoke									</option>
																	<option value="15">
									Music									</option>
																	<option value="16">
									Musical									</option>
																	<option value="17">
									Romance									</option>
																	<option value="19">
									Sci-Fi									</option>
																	<option value="20">
									Special Interest									</option>
																	<option value="21">
									Suspense Thriller									</option>
																	<option value="22">
									Television Programming									</option>
																	<option value="23">
									Western									</option>
															</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="rating-id" class="col-sm-3 col-form-label text-sm-right">Rating:</label>
						<div class="col-sm-9">
							<select name="rating" id="rating-id" class="form-control">
								<option value="" selected>-- All --</option>

																	<option value="2">
									G									</option>
																	<option value="3">
									NC-17									</option>
																	<option value="4">
									NR									</option>
																	<option value="5">
									PG									</option>
																	<option value="6">
									PG-13									</option>
																	<option value="7">
									R									</option>
																	<option value="8">
									UR									</option>
															</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="label-id" class="col-sm-3 col-form-label text-sm-right">Label:</label>
						<div class="col-sm-9">
							<select name="label" id="label-id" class="form-control">
								<option value="" selected>-- All --</option>

																	<option value="1">
																		</option>
																	<option value="2">
									550 Music									</option>
																	<option value="3">
									A&E									</option>
																	<option value="4">
									A.D. Vision									</option>
																	<option value="5">
									A.D.V. Films 									</option>
																	<option value="6">
									Acorn Media									</option>
																	<option value="7">
									All Day Entertainment									</option>
																	<option value="8">
									Amazing Fantasy									</option>
																	<option value="9">
									American Gramaphone									</option>
																	<option value="10">
									American Software									</option>
																	<option value="11">
									Anchor Bay 									</option>
																	<option value="12">
									A-Pix									</option>
																	<option value="13">
									Artisan									</option>
																	<option value="14">
									BMG Music									</option>
																	<option value="15">
									Brentwood 									</option>
																	<option value="16">
									Buena Vista									</option>
																	<option value="17">
									Cala Records									</option>
																	<option value="18">
									Castle Rock									</option>
																	<option value="19">
									CAV									</option>
																	<option value="20">
									Central Park Media									</option>
																	<option value="21">
									Cerebellum									</option>
																	<option value="22">
									Chesky									</option>
																	<option value="23">
									Classic Records									</option>
																	<option value="24">
									Columbia TriStar									</option>
																	<option value="25">
									Creative Design Art									</option>
																	<option value="26">
									Criterion 									</option>
																	<option value="27">
									Delos 									</option>
																	<option value="28">
									Delta Entertainment									</option>
																	<option value="29">
									DG									</option>
																	<option value="30">
									Digital Disc Ent. 									</option>
																	<option value="31">
									Digital Leisure									</option>
																	<option value="32">
									Digital Multimedia									</option>
																	<option value="33">
									Digital Versatile Disc									</option>
																	<option value="34">
									Direct Source									</option>
																	<option value="35">
									Direct Video									</option>
																	<option value="36">
									DMG Entertainment									</option>
																	<option value="37">
									Dream Theater									</option>
																	<option value="38">
									DreamWorks									</option>
																	<option value="39">
									DVD International									</option>
																	<option value="40">
									E Real Biz									</option>
																	<option value="41">
									Eaton Entertainment									</option>
																	<option value="42">
									Elite Entertainment									</option>
																	<option value="43">
									EMI									</option>
																	<option value="44">
									Epic Records Group									</option>
																	<option value="45">
									Fantoma									</option>
																	<option value="46">
									First Run Features									</option>
																	<option value="47">
									Focus Film									</option>
																	<option value="48">
									Fox Lorber									</option>
																	<option value="49">
									Front Row 									</option>
																	<option value="50">
									Full Moon 									</option>
																	<option value="51">
									Goldhil Home									</option>
																	<option value="52">
									Goodtimes									</option>
																	<option value="53">
									HBO									</option>
																	<option value="54">
									Ideal Entertainment									</option>
																	<option value="55">
									Image									</option>
																	<option value="56">
									Image/Criterion									</option>
																	<option value="57">
									IVN Entertainment 									</option>
																	<option value="58">
									Key East Entertainment									</option>
																	<option value="59">
									Kino									</option>
																	<option value="60">
									Lee & Lee Communications									</option>
																	<option value="61">
									Legacy									</option>
																	<option value="62">
									Leo Films 									</option>
																	<option value="63">
									Live									</option>
																	<option value="64">
									Living Arts									</option>
																	<option value="65">
									Lumivision									</option>
																	<option value="66">
									Lyrick Studios									</option>
																	<option value="67">
									MacDaddy									</option>
																	<option value="68">
									Madacy									</option>
																	<option value="69">
									Magic Lantern Entertainment									</option>
																	<option value="70">
									Manga									</option>
																	<option value="71">
									Master Tone									</option>
																	<option value="72">
									MCA Music									</option>
																	<option value="73">
									Media Galleries									</option>
																	<option value="74">
									MGM									</option>
																	<option value="75">
									Monarch									</option>
																	<option value="76">
									Monterey 									</option>
																	<option value="77">
									Morgan Creek									</option>
																	<option value="78">
									MPI									</option>
																	<option value="80">
									MTI Home Video									</option>
																	<option value="81">
									Multicom 									</option>
																	<option value="82">
									Multimedia 2000 									</option>
																	<option value="83">
									Music Video Distributors									</option>
																	<option value="84">
									N2K Encoded Music									</option>
																	<option value="85">
									Nettwerk									</option>
																	<option value="86">
									New Horizons									</option>
																	<option value="87">
									New Line									</option>
																	<option value="88">
									New Video									</option>
																	<option value="89">
									NuTech									</option>
																	<option value="90">
									Pacific Digital									</option>
																	<option value="91">
									Panasonic									</option>
																	<option value="92">
									Paramount 									</option>
																	<option value="93">
									Passport Video									</option>
																	<option value="94">
									Picture This Home Video									</option>
																	<option value="95">
									Pioneer									</option>
																	<option value="96">
									Platinum 									</option>
																	<option value="97">
									Sunland Studios									</option>
																	<option value="98">
									PolyGram									</option>
																	<option value="99">
									PolyGram/U.S.A. Home Entertainment									</option>
																	<option value="100">
									PPI 									</option>
																	<option value="101">
									Program Power Entertainment 									</option>
																	<option value="102">
									Putumayo World Music 									</option>
																	<option value="103">
									QuickBand									</option>
																	<option value="104">
									Real Entertainment									</option>
																	<option value="105">
									Regency									</option>
																	<option value="106">
									Republic 									</option>
																	<option value="107">
									Rhino									</option>
																	<option value="108">
									Troma									</option>
																	<option value="109">
									Rykodisc									</option>
																	<option value="110">
									Shanachie									</option>
																	<option value="111">
									Showtime									</option>
																	<option value="112">
									Simitar									</option>
																	<option value="113">
									E Realbiz									</option>
																	<option value="114">
									Sony Classical 									</option>
																	<option value="115">
									Sony Music									</option>
																	<option value="116">
									Sony Wonder									</option>
																	<option value="117">
									Studio Home Entertainment									</option>
																	<option value="118">
									Super Digital Media									</option>
																	<option value="119">
									Synapse 									</option>
																	<option value="120">
									Tai Seng									</option>
																	<option value="121">
									Trimark 									</option>
																	<option value="122">
									Troma									</option>
																	<option value="123">
									Turner									</option>
																	<option value="124">
									Twentieth Century Fox									</option>
																	<option value="125">
									U.S.A. Home Entertainment									</option>
																	<option value="126">
									United American Video									</option>
																	<option value="127">
									Universal									</option>
																	<option value="128">
									VCI Home Video									</option>
																	<option value="129">
									Ventura									</option>
																	<option value="130">
									Victory									</option>
																	<option value="131">
									Video Watchdog									</option>
																	<option value="132">
									Vista Street									</option>
																	<option value="133">
									Viz Communications 									</option>
																	<option value="134">
									Warner									</option>
																	<option value="135">
									Warner Music 									</option>
																	<option value="136">
									Water Bearer									</option>
																	<option value="137">
									WGBH Boston Video									</option>
																	<option value="138">
									Wolfe									</option>
																	<option value="139">
									World Video									</option>
																	<option value="140">
									WWF									</option>
																	<option value="141">
									Xenon									</option>
																	<option value="142">
									Xoom Software									</option>
																	<option value="144">
									York Entertainment									</option>
																	<option value="145">
									Avalanche									</option>
																	<option value="146">
									Red Distribution									</option>
																	<option value="147">
									New Yorker									</option>
																	<option value="148">
									Steeplechase									</option>
																	<option value="149">
									Renegade									</option>
																	<option value="150">
									Koch									</option>
																	<option value="151">
									5.1 Entertainment									</option>
																	<option value="152">
									Unapix									</option>
																	<option value="153">
									Barrel									</option>
																	<option value="154">
									BFS Entertainment									</option>
																	<option value="155">
									Vanguard									</option>
																	<option value="156">
									Bell Canyon									</option>
																	<option value="157">
									Hen's Tooth									</option>
																	<option value="158">
									MVC									</option>
																	<option value="159">
									Marengo									</option>
																	<option value="160">
									Caroline									</option>
																	<option value="161">
									Questar									</option>
																	<option value="162">
									Right Stuf									</option>
																	<option value="163">
									Media Blasters									</option>
																	<option value="164">
									PM									</option>
																	<option value="165">
									New Concorde									</option>
															</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="format-id" class="col-sm-3 col-form-label text-sm-right">Format:</label>
						<div class="col-sm-9">
							<select name="format" id="format-id" class="form-control">
								<option value="" selected>-- All --</option>

																	<option value="2">
									Fullscreen, Widescreen									</option>
																	<option value="4">
									Fullscreen									</option>
																	<option value="8">
									Widescreen									</option>
															</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="sound-id" class="col-sm-3 col-form-label text-sm-right">Sound:</label>
						<div class="col-sm-9">
							<select name="sound" id="sound-id" class="form-control">
								<option value="" selected>-- All --</option>

																	<option value="1">
									Dolby TrueHD									</option>
																	<option value="2">
									Dolby Digital 5.1, DTS									</option>
																	<option value="3">
									Dolby Digital 5.1									</option>
																	<option value="4">
									DTS									</option>
																	<option value="7">
									other									</option>
															</select>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="award-id" class="col-sm-3 col-form-label text-sm-right">Award:</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox3" value="any" checked>Any
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox1" value="yes">Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input mr-2" type="radio" name="award" id="inlineCheckbox2" value="no">No
								</label>
							</div>
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row">
						<label for="date-id" class="col-sm-3 col-form-label text-sm-right">Release Date:</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col">
									<label class="form-check-label">
										From: 
										<input type="date" class="form-control mt-2" name="release_date_from">
									</label>
								</div> <!-- .col -->
								<div class="col">
									<label class="form-check-label">
										to: 
										<input type="date" class="form-control mt-2" name="release_date_to">
									</label>
								</div> <!-- .col -->
							</div> <!-- .row -->
						</div> <!-- .col -->
					</div> <!-- .form-group -->

					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9 mt-2">
							<button type="submit" class="btn btn-primary">Search</button>
							<button type="reset" class="btn btn-light">Reset</button>
						</div>
					</div> <!-- .form-group -->

				</form>

				
	</div> <!-- .container -->
</body>
</html>