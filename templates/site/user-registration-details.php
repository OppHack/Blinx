<?php
session_start();

$this->layout('bootstrap-template', ['title' => 'Blinx - User Registration'])
?>

<div class="content">

    <div class="container">

        <div class="col-sm-3"></div>

        <div class="row">
            <div class="col-sm-6">

                <div class="form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Welcome, <?php if (isset($_SESSION['form-first-name'])) {
                                    print stripslashes($_SESSION['form-first-name']);
                                }
                                ?> We need few more details</h3>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" method="post" class="login-form"
                              action="finishregistration.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="sr-only" for="form-mobile-number">Mobile Number</label>
                                <input type="text" name="form-mobile-number" placeholder="Mobile Number..."
                                       class="form-mobile-number form-control" id="form-mobile-number">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-alternate-mobile">Alternative Mobile Number</label>
                                <input type="text" name="form-alternate-mobile"
                                       placeholder="Alternative Mobile Number..."
                                       class="form-password form-control" id="form-alternate-mobile">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-dob">Date of Birth</label>
                                <input type="text" name="form-dob" placeholder="Date of Birth..."
                                       class="form-password form-control" id="form-dob" value="<?php
                                if (isset($_SESSION['form-birthday'])) {
                                    print stripslashes($_SESSION['form-birthday']);
                                } else {
                                    print '';
                                } ?>">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-gender">Gender</label>
                                <input type="text" name="form-gender" placeholder="Gender..."
                                       class="form-password form-control" id="form-gender" value="<?php
                                if (isset($_SESSION['form-gender'])) {
                                    print stripslashes($_SESSION['form-gender']);
                                } else {
                                    print '';
                                } ?>">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-qual">Qualification</label>
                                <input type="text" name="form-qual" placeholder="Qualification..."
                                       class="form-password form-control" id="form-qual">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-inst">Institution</label>
                                <input type="text" name="form-inst" placeholder="Institution..."
                                       class="form-password form-control" id="form-inst">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-occ">Occupation</label>
                                <input type="text" name="form-occ" placeholder="Occupation..."
                                       class="form-password form-control" id="form-occ">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-add">Address</label>
                                <input type="text" name="form-add" placeholder="Address..."
                                       class="form-password form-control" id="form-add">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-geo">Geo Location</label>
                                <input type="text" name="form-geo" placeholder="Geo Location..."
                                       class="form-password form-control typeahead tt-query" id="form-geo">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-state">State</label>
                                <input type="text" name="form-state" placeholder="State..."
                                       class="form-password form-control typeahead tt-query" id="form-state">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-dist">District</label>
                                <input type="text" name="form-dist" placeholder="District..."
                                       class="form-password form-control" id="form-dist">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-pic">Profile Picture</label>
                                <h4>Profile Picture</h4>
                                   <span class="btn btn-default btn-file ">
                                       Browse <input type="file" id="profilepic" name="profilePic">
                                   </span>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-pic">Document Proof</label>
                                <h4>Document Proof</h4>
                                     <span class="btn btn-default btn-file">
                                       Browse <input type="file" id="fileToUpload" name="name1">
                                   </span>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>


            </div>


        </div>

    </div>

    <script src="/assets/bootstrap/js/typeahead.bundle.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('input.form-state').typeahead({
                name: 'states',
                local: ['Andaman and Nicobar Islands', 'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chandigarh', 'Chhattisgarh', 'Dadra and Nagar Haveli', 'Daman and Diu', 'Delhi', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Lakshadweep', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Orissa', 'Pondicherry', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Tripura', 'Uttaranchal', 'Uttar Pradesh', 'West Bengal']
            });
        });
    </script>
    <script>
        var latitude = '';
        var longitude = '';
        $(document).ready(
            function initialize() {
                var input = document.getElementById('form-geo');
                var options = {componentRestrictions: {country: 'in'}};
                var autocomplete = new google.maps.places.Autocomplete(input, options);
                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    var inputA = document.getElementById('form-geo').value;
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'address': inputA
                    }, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            latitude = results[0].geometry.location.lat();
                            longitude = results[0].geometry.location.lng();
                        }
                    });
                });
            });
    </script>

</div>
