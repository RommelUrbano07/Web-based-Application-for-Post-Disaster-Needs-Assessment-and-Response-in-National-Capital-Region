<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name='viewport' content="width=device-width" />
        <link rel='icon' type="image/png" href="../resources/images/image/logo.png">
        <title>Update Personal Information</title>
        <!--     Fonts and icons     -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel='stylesheet'>
        <!-- CSS Files -->
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel='stylesheet'/>
        <link href="../lib/assets/css/gsdk-bootstrap-wizard.css" rel='stylesheet'/>
        <link href="../lib/css/style.css" rel='stylesheet'/>
        <script src='../lib/jquery/jquery-3.4.1.min.js' type="text/javascript"></script>
        <script src='../lib/popper.js/popper.min.js' type="text/javascript"></script>
        <script src='../lib/bootstrap/js/bootstrap.min.js' type="text/javascript"></script>
    </head>

    <body>
        <?php
        $username = "";
        $password = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = htmlspecialchars($_REQUEST['AdminUsername']);
            $password = htmlspecialchars($_REQUEST['AdminPassword']);
        }
        ?>
        <div class = "container" id = "wrap">
            <div id = "formContent">
                <div class = 'row'>
                    <div class = 'col-1'>
                        <form action = "adminMenu.php" method = "POST">
                            <input type = 'hidden' name = 'AdminUsername' value = "<?php echo $username ?>"/>
                            <input type = 'hidden' name = 'AdminPassword' value = "<?php echo $password ?>"/>
                            <input type = 'submit' title = 'Go Back' style = 'all: unset; font-family: FontAwesome; cursor: pointer;background: none; background-color: rgba(0,0,0,0); border-style: none; border-color: rgba(0,0,0,0); color: #56baed;' value = '&#xf060' />
                        </form>
                    </div>
                </div>
                <h4> <legend>Update Person Information</legend></h4>
                <form method="POST" action="UpdatePersonInfoPROCESS.php" id='registrationForm'>
                    <input type = 'hidden' name = 'AdminUsername' value = "<?php echo $username ?>"/>
                    <input type = 'hidden' name = 'AdminPassword' value = "<?php echo $password ?>"/>
                    <?php
                    $FirstName = htmlspecialchars($_REQUEST['FirstName']);
                    $MiddleName = htmlspecialchars($_REQUEST['MiddleName']);
                    $LastName = htmlspecialchars($_REQUEST['LastName']);
                    $Suffix = htmlspecialchars($_REQUEST['Suffix']);
                    
                    include '../_COMMANDS/FamilyEdit.php';
                    $FamilyEdit = new FamilyEdit();
                    $PersonID = $FamilyEdit->getPersonID($FirstName, $MiddleName, $LastName, $Suffix);
                    $PersonInformation = $FamilyEdit->getPersonInformation($PersonID);
                    if (mysqli_num_rows($PersonInformation) > 0) {
                        while ($rows = mysqli_fetch_assoc($PersonInformation)) {
                            ?>
                            <input type="hidden" value="<?php echo $PersonID ?>" name="PersonID"/>
                            <div class='tab-pane' id='ls0'>

                                <fieldset id='fs0'>
                                    <div class='row'>
                                        <div class='column'>
                                            <div class="form-group" >
                                                <input value='<?php echo $rows['FirstName'] ?>' name='firstName0' type='text' class="form-control" placeholder="First Name" title='First Name' data-pattern='textOnly' required>
                                            </div>
                                        </div>
                                        <div class='column'>
                                            <div class="form-group">
                                                <input value='<?php echo $rows['MiddleName'] ?>' name='middleName0' type='text' class="form-control" placeholder="Middle Name" data-pattern='textOnly' required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class='row'>
                                        <div class='column'>
                                            <div class="form-group">
                                                <input value='<?php echo $rows['LastName'] ?>'  name='lastName0' type='text' class="form-control" placeholder="Last Name" data-pattern='textOnly' required>
                                            </div>
                                        </div>
                                        <div class='column'>
                                            <div class="form-group">
                                                <input value="<?php
                                                if ($rows['Suffix'] == ' ') {
                                                    echo '';
                                                } else {    
                                                    echo $rows['Suffix'];
                                                    }
                                                ?>"  name='suffix0' type='text' class="form-control" placeholder='Suffix' data-pattern='textOnly'>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class='row'>
                                        <div class='column'>
                                            <div class="form-group">
                                                <input value='<?php echo $rows['ContactNo'] ?>' name='contactNo0' class="form-control" type='tel' placeholder="Contact No." minlength=11 maxlength=13 title='Contact Number' data-pattern='numberOnly' required>
                                            </div>
                                        </div>
                                        <div class='column'>
                                            <div class="form-group">
                                                <input value='<?php echo $rows['HouseNo'] ?>' type='text' class="form-control" placeholder='House No.' name='houseNo0' title='House Number'>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class='row'>
                                        <div class='column'>
                                            <div class="form-group">
                                                <input value='<?php echo $rows['StreetName'] ?>' type='text' class="form-control" placeholder='Street Name' name='streetName0' title='Street Name' required>
                                            </div>
                                        </div>
                                        <div class='column'>
                                            <div class="form-group">
                                                <input value='<?php echo $rows['Subdivision'] ?>' type='text' class="form-control" placeholder='Subdivision' name='subdivision' title='Subdivision'>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class='row'>
                                        <div class='column'>
                                            <div class="custom-select" style='height: auto;'>
                                                <input value='<?php echo $rows['BirthDate'] ?>'  type='date' class="form-control"  placeholder="Birth Date" name='birthDate0' value="yyyy-mm-dd" class='birthdate' title='Birth Date' required>
                                            </div>
                                        </div>
                                        <div class='column'>
                                            <div class="custom-select" style='height: auto;'>
                                                <select name='region' class="form-control" id='region' onchange='updateCity();' required>
                                                    <option value='ARMM' disabled>ARMM (Autonomous Region in Muslim Mindanao)</option>
                                                    <option value='CAR' disabled>CAR (Cordillera Administrative Region)</option>
                                                    <option value='NCR' selected>NCR (National Capital Region)</option>
                                                    <option value='Region I' disabled>Region I (Ilocos Region)</option>
                                                    <option value='Region II' disabled>Region II (Cagayan Valley)</option>
                                                    <option value='Region III' disabled>Region III (Central Luzon)</option>
                                                    <option value='Region IV-A' disabled>Region IV-A (CALABARZON)</option>
                                                    <option value='Region IV-B' disabled>Region IV-B (MIMAROPA)</option>
                                                    <option value='Region V' disabled>Region V (Bicol Region)</option>
                                                    <option value='Region VI' disabled>Region VI (Western Visayas)</option>
                                                    <option value='Region VII' disabled>Region VII (Central Visayas)</option>
                                                    <option value='Region VIII' disabled>Region VIII (Eastern Visayas)</option>
                                                    <option value='Region IX' disabled>Region IX (Zamboanga Peninsula)</option>
                                                    <option value='Region X' disabled>Region X (Northern Mindanao)</option>
                                                    <option value='Region XI' disabled>Region XI (Davao Region)</option>
                                                    <option value='Region XII' disabled>Region XII (SOCCSKSARGEN)</option>
                                                    <option value='Region XIII' disabled>Region XIII (Caraga Region)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class='row'>
                                        <div class='column'>
                                            <div name='barangay' class="custom-select" id='barangay' style='height: auto;'></div>
                                        </div>
                                        <div class='column'>
                                            <div name='city' class="custom-select" id='city' style='height: auto;'></div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class='row'>
                                        <div class="column">
                                            <div class="form-check form-check-inline">
                                                <input type='radio' name='sex' value='1' class='form-check-input'/>
                                                <label for='male0' class='form-check-label'>Male</label>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="form-check form-check-inline">
                                                <input type='radio' name='sex' value='0' class='form-check-input'/>
                                                <label for='female0' class='form-check-label'>Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div id='BTNS'>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <input type="submit"/>  
                                    </div>
                                    <br><br><br><br>

                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
        <script>
            // Sets the maximum date allowed.
            $(document).ready(function () {
                updateMaxDate();
                updateCity();
                updateBarangay();
                updateInputPattern();
            });
            // Variables needed for the dynamic form
            var formLength = 1;
            // Adds a field set inside the form
            function addForm() {
                // Creates the field where a new form will be appended.
                let form = $(
                        "<div class='tab-pane' id='ls" + formLength + "'>" +
                        "<fieldset id='fs" + formLength + "'>" +
                        "<hr><div class='row'>" +
                        "<div class='column'>" +
                        "<div class='form-group'>" +
                        "<input name='firstName" + formLength + "' type='text' class='form-control' placeholder='First Name' title='First Name' data-pattern='textOnly' required>" +
                        "</div>" +
                        "</div>" +
                        "<div class='column'>" +
                        "<div class='form-group'>" +
                        "<input type='text' placeholder='Middle Name' name='middleName" + formLength + "' title='Middle Name' class='form-control' data-pattern='textOnly'><br>" +
                        "</div>" +
                        "</div>" +
                        "</div><br>" +
                        "<div class='row'>" +
                        "<div class='column'>" +
                        "<div class='form-group'>" +
                        "<input type='text' placeholder='Last Name' name='lastName" + formLength + "' title='Last Name' class='form-control' data-pattern='textOnly'><br>" +
                        "</div>" +
                        "</div>" +
                        "<div class='column'>" +
                        "<div class='form-group'>" +
                        "<input type='text' placeholder='Suffix' name='suffix" + formLength + "' title='Suffix Name' class='form-control'><br>" +
                        "</div>" +
                        "</div>" +
                        "</div><br>" +
                        "<div class='row'>" +
                        "<div class='column'>" +
                        "<div class='form-group'>" +
                        "<div class='custom-select' style='height: 60px;'>" +
                        "<input type='date' placeholder='Birth Date' name='birthDate" + formLength + "' value='yyyy-MM-dd'  class='form-control' title='Birth Date' required/><br>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<div class='column'>" +
                        "<div class='form-group'>" +
                        "<input type='tel' placeholder='Contact No.' name='contactNo" + formLength + "' min=0 title='Contact Number' data-pattern='numberOnly' class='form-control'><br>" +
                        "</div>" +
                        "</div>" +
                        "</div><br><br>" +
                        "<div class='row'>" +
                        "<div class='column'>" +
                        "<div class='form-check form-check-inline'>" +
                        "<input type='radio' name='sex" + formLength + "' id='male" + formLength + "' value='1' class='form-check-input' /><label for='male" + formLength + "' class='form-check-label'>Male</label>" +
                        "</div>" +
                        "</div>" +
                        "<div class='column'>" +
                        "<div class='form-group'>" +
                        "<input type='radio' name='sex" + formLength + "' id='female " + (formLength++) + "' value='0' class='form-check-input' /><label for='female" + formLength + "' class='form-check-label'>Female</label>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</fieldset>" +
                        "<br><br></div>"
                        );
                // Removes the buttons
                let btns = $("#BTNS");
                let btnTmp = btns;
                btns.remove();
                // Appends the form to this element.
                $("#forms").append(form);
                // Appends the button so they're at the end.
                $("#forms").append(btnTmp);
                // Updates the number of forms
                $("#formLength").attr({
                    'value': (formLength)
                });
                // Updates the max attribute for the newly added input date element
                updateMaxDate();
                // Updates the input pattern for the input elements
                updateInputPattern();
            }
            // Removes a field set inside the form
            function removeForm() {
                // If there's only a single form left.
                if (formLength == 1) {
                    alert("Cannot remove last form.");
                    return;
                }
                // Removes the recently added form
                $("#ls" + (--formLength)).remove();
                // Updates the number of forms
                $("#formLength").attr({
                    'value': (formLength++)
                });
            }
            // CUSTOM METHODS
            function updateMaxDate() {
                var now = new Date();
                var month = (now.getMonth() + 1);
                var day = now.getDate();
                if (month < 10)
                    month = '0' + month;
                if (day < 10)
                    day = '0' + day;
                var date = (now.getFullYear()) + '-' + month + '-' + day;
                $('.birthdate').attr({'max': date});
            }
            // UPDATE CITY
            let oldCity, updateCityFirst = true;
            function updateCity() {
                let city, value = $("#region").children("option:selected").val().replace(/\s/g, '_'),
                        str = "<select name='city' class='form-control' id='" + value + "' onchange='updateBarangay();' required>", arr;
                if (updateCityFirst)
                    updateCityFirst = false;
                else
                    oldCity.remove();
                switch (value) {
                    case 'NCR':
                        arr = ['Caloocan', "Las Piñas", 'Makati', 'Malabon', 'Mandaluyong', "Manila City", 'Marikina', 'Muntinlupa', 'Navotas', 'Parañaque', "Pasay City", "Pasig City", 'Pateros', "Quezon City", "San Juan", 'Taguig', 'Valenzuela'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>" + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>" + arr[i] + "</option>";
                        }
                        break;
                }
                str += "</select>";
                city = $(str);
                $("#city").append(city);
                oldCity = $("#" + value);
            }
            let oldBarangay, updateBarangayFirst = true;
            function updateBarangay() {
                let barangay, value = $("#city").children('select').children("option:selected").val().replace(/\s/g, '_'),
                        str = "<select name='barangay' class='form-control' id='" + value + "' required>", arr;
                if (updateBarangayFirst)
                    updateBarangayFirst = false;
                else
                    oldBarangay.remove();
                switch (value) {
                    case 'Caloocan':
                        for (let i = 1; i < 189; i++) {
                            if (i == 1)
                                str += "<option value='Barangay_" + i + "' selected>Barangay " + i + "</option>";
                            else
                                str += "<option value='Barangay_" + i + "'>Barangay " + i + "</option>";
                        }
                        break;
                    case 'Las_Piñas':
                        arr = ["Almanza Dos", "Almanza Uno", "B. F. International Village", "Daniel Fajardo", "Elias Aldana", 'Ilaya', "Manuyo Dos", "Manuyo Uno", "Pamplona Dos", "Pamplona Tres", "Pamplona Uno", 'Pilar', "Pulang Lupa Dos", "Pulang Lupa Uno", "Talon Dos", "Talon Kuatro", "Talong Singko", "Talon Tres", "Talon Uno", 'Zapote'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Makati':
                        arr = ['Bangkal', "Bel-Air", 'Carmona', 'Cembo', 'Comembo', "Dasmariñas, East Rembo", "Forbes Park", "Guadalupe Nuevo", "Guadalupe Viejo", 'Kasilawan', "La Paz", 'Magallanes', 'Olympia', 'Palanan', 'Pembo', 'Pinagkaisahan', "Pio Del Pilar", 'Pitogo', 'Poblacion', "Post Proper Northside", "Post Proper Southside", 'Rizal', "San Antonio", "San Isidro", "San Lorenzo", "Santa Cruz", 'Signkamas', "South Cembo", 'Tejeros', 'Urdaneta', 'Valenzuela', "West Rembo"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Malabon':
                        arr = ['Acacia', 'Baritan', "Bayan-Bayanan", 'Catmon', 'Concepcion', 'Dampalit', 'Flores', "Hulong Duhat", 'Ibaba', 'Longos', 'Maysilo', 'Muzon', 'Niugan', 'Panghulo', 'Potrero', "San Agustin", 'Santolan', 'Tañong', 'Tinajeros', 'Tonsuya', 'Tugatog'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Mandaluyong':
                        arr = ["Addition Hills", "Bagong Silang", "Barangka Drive", "Barangka Ibaba", "Barangka Ilaya", "Barangka Itaas", "Buayang Bato", 'Burol', "Daang Bakal", "Hagdang Bato Itaas", "Hagdang Bato Libis", "Harapin Ang Bukas", "Highway Hills", 'Hulo', "Mabini-J. Rizal", 'Malamig', 'Mauway', 'Namayan', "New Zañiga", "Old Zañiga", "Pag-asa", 'Plainview', "Pleasant Hills", 'Poblacion', "San Jose", 'Vergara', "Wack-Wack Greenhills"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Manila_City':
                        for (let i = 1; i < 906; i++) {
                            if (i == 1)
                                str += "<option value='Barangay_" + i + "' selected>Barangay " + i + "</option>";
                            else {
                                if ((i >= 21 && i <= 24) || (i == 27) || (i == 40) || (i >= 113 && i <= 115) || (i >= 277 && i <= 280) || (i == 665) || (i == 854))
                                    continue;
                                if (i == 659 || i == 660 || i == 663 || i == 664 || i == 587 || i == 818 || i == 202)
                                    str += "<option value='Barangay_" + i + "'>Barangay " + i + "-A</option>";
                                str += "<option value='Barangay_" + i + "'>Barangay " + i + "</option>";
                            }
                        }
                        break;
                    case 'Marikina':
                        arr = ['Barangka', 'Calumpang', "Concepcion Dos", "Concepcion Uno", 'Fortune', "Industrial Valley", "Jesus De La Peña", 'Malanday', "Marikina Heights", 'Nangka', 'Parang', "San Roque", "Santa Elena", "Santo Niño", 'Tañong', 'Tumana'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Muntinlupa':
                        arr = ['Alabang', 'Bayanan', 'Buli', 'Cupang', "New Alabang Village", 'Poblacion', 'Putatan', 'Sucat', 'Tunasan'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Navotas':
                        arr = ["Bagumbayan North", "Bagumbayan South", 'Bangculasi', 'Daanghari', "Navotas East", "Navotas West", "North Bay Blvd. North", "North Bay Blvd. South", "San Jose", "San Rafael Village", "San Roque", "Sipac-Almacen", 'Tangos', 'Tanza'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Parañaque':
                        arr = ['Baclaran', "B. F. Homes", "Don Bosco", "Don Galo", "La Huerta", "Marcelo Green Village", 'Merville', 'Moonwalk', "San Antonio", "San Dionisio", "San Isidro", "San Martin De Porres", "Santo Niño", "Sun Valley", 'Tambo', 'Vitalez'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Pasay_City':
                        for (let i = 1; i < 202; i++) {
                            if (i == 1)
                                str += "<option value='" + i + "' selected>Barangay " + i + "</option>";
                            else
                                str += "<option value='" + i + "'>Barangay " + i + "</option>";
                        }
                        break;
                    case 'Pasig_City':
                        arr = ["Bagong Ilog", "Bagong Katipunan", 'Bambang', 'Buting', 'Caniogan', "Dela Paz", 'Kalawaan', 'Kapasigan', 'Kapitolyo', 'Malinao', 'Manggahan', 'Maybunga', 'Oranbo', 'Palatiw', 'Pinagbuhatan', 'Pineda', 'Rosario', 'Sagad', "San Antonio", "San Joaquin", "San Jose", "San Miguel", "San Nicolas", "Santa Cruz", "Santa Lucia", "Santa Rosa", 'Santolan', "Santo Tomas", 'Sumilang', 'Ugong'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Pateros':
                        arr = ['Aguho', 'Magtanggol', "Martires del 96", 'Poblacion', "San Pedro", "San Roque", "Santa Ana", "Santo Rosario East", "Santo Rosario West", 'Tabacalera'];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Quezon_City':
                        arr = ['Alicia', 'Amihan', "Apolonio Samson", 'Aurora', 'Baesa', 'Bagbag', "Bagong Lipunan Ng Crame", "Bagong Pag-asa", "Bagong Silang", 'Bagumbayan', "Bahay Toro", 'Balingasa', "Balong Bato", "Batasan Hills", 'Bayanihan', "Blue Ridge A", "Blue Ridge B", 'Botocan', 'Bungad', "Camp Aguinaldo", 'Capri', 'Central', 'Claro', 'Commonwealth', 'Culiat', 'Damar', 'Damayan', "Damayang Lagi", "Del Monte", "Dioquino Zobel", "Doña Imelda", "Doña Josefa", "Don Manuel", "Duyan-Duyan", "East Kamias", "E. Rodriguez", "Escopa I", "Escopa II", "Escopa III", "Escopa IV", 'Fairview', "Greater Lagro", 'Gulod', "Holly Spirit", 'Horseshoe', "Immaculate Concepcion", 'Kaligayahan', 'Kalusugan', 'Kamuning', 'Katipunan', 'Kaunlaran', "Kristong Hari", "Krus Na Ligas", "Laging Handa", 'Libis', 'Lourdes', "Loyola Heights", 'Maharlika', 'Malaya', 'Mangga', 'Manresa', 'Mariana', 'Mariblo', 'Marilag', 'Masagana', 'Masambong', "Matandang Balara", 'Milagrosa', "Nagkaisang Nayon", "Nayong Kanluran", "New Era", "North Fairview", "Novaliches Proper", "N.S. Amoranto", 'Obrero', "Old Capitol Site", "Paang Bundok", "Pag-ibig sa Nayon", 'Paligsahan', 'Paltok', 'Pansol', 'Paraiso', "Pasong Putik Proper", "Pasong Tamo", 'Payatas', "Phil-Am", 'Pinagkaisahan', 'Pinyahan', "Project 6", "Quirino 2-A", "Quirino 2-B", "Quirino 2-C", "Quirino 3-A", "Ramon Magsaysay", 'Roxas', "Sacred Heart", "Saint Ignatius", "Saint Peter", 'Salvacion', "San Augustin", "San Antonio", "San Bartolome", 'Sangandaan', "San Isidro", "San Isidro Labrador", "San Jose", "San Martin De Porres", "San Roque", "Santa Cruz", "Santa Lucia", "Santa Monica", "Santa Teresita", "Santo Cristo", "Santo Domingo", 'Santol', "Santo Niño", "San Vicente", 'Sauyo', 'Sienna', "Sikatuna Village", 'Silangan', 'Socorro', "South Triangle", 'Tagumpay', 'Talayan', 'Talipapa', "Tandang Sora", 'Tatalon', "Teacehrs Village East", "Teachers Village West", "Ugong Norte", "Unang Sigaw", "U.P. Campus", "U.P. Village", 'Valencia', 'Vasra', "Veterans Village", "Villa Maria Clara", "West Kamias", "West Triangle", "White Plains"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'San_Juan':
                        arr = ["Addition Hills", "Balong-Bato", 'Batis', "Corazon de Jesus", 'Ermitaño', 'Greenhills', "Halo-halo", 'Isabelita', 'Kabayanan', "Little Baguio", 'Maytunas', 'Onse', 'Pasadeña', "Pedro Cruz", 'Progreso', 'Rivera', 'Salapan', "San Perfecto", "Santa Lucia", 'Tibagan', "West Crame"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Taguig':
                        arr = ['Bagumbayan', 'Bambang', 'Calzada', "Central Bicutan", "Cewntral Signal Village", "Fort Bonifacio", 'Hagonoy', "Ibayo-Tipas", 'Katuparan', "Ligid-Tipas", "Lower Bicutan", "Maharlika Village", 'Napindan', "New Lower Bicutan", "North Daang Hari", "North Signal Village", 'Palingon', 'Pinagsama', "San Miguel", "Santa Ana", "South Daang Hari", "South Signal Village", 'Tanyag', 'Tuktukan', "Upper Bicutan", 'Ususan', 'Wawa', "Western Bicutan"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                    case 'Valenzuela':
                        arr = ["Arkong Bato", 'Bagbaguin', 'Balangkas', 'Bignay', 'Bisig', "Canumay East", "Canumay West", 'Coloong', 'Dalandanan', "Hen. T. De Leon", 'Isla', 'Karuhatan', "Lawang Bato", 'Lingunan', 'Mabolo', 'Malandsay', 'Malinta', "Mapulang Lupa", 'Marulas', 'Maysan', 'Palasan', 'Parada', "Pariancillo Villa", "Paso De Blas", 'Pasolo', 'Poblacion', 'Pulo', 'Punturin', 'Rincon', 'Tagalag', 'Ugong', "Viente Reales", "Wawang Pulo"];
                        for (let i = 0; i < arr.length; i++) {
                            if (i == 0)
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "' selected>Barangay " + arr[i] + "</option>";
                            else
                                str += "<option value='" + arr[i].replace(/\s/g, '_') + "'>Barangay " + arr[i] + "</option>";
                        }
                        break;
                }
                str += "</select>";
                barangay = $(str);
                $("#barangay").append(barangay);
                oldBarangay = $("#" + value);
            }
            function updateInputPattern() {
                const specKey = ['Escape', 'AudioVolumeMute', 'AudioVolumeUp', 'AudioVolumeDown', 'Meta', 'Backspace', 'Delete', 'Shift', 'Tab', 'CapsLock', 'Shift', 'Control', 'Alt', 'ArrowRight', 'ArrowLeft', 'ArrowUp', 'ArrowDown', 'Enter', 'F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10', 'F11', 'F12', 'Home', 'End', 'PageUp', 'PageDown'];
                const textOnly = /[A-Za-z\.\s]+/g;
                const numberOnly = /[\d]+/g;
                const specChar = /[\\\^\$\.\|\?\*\+\(\)\[\]\{\}/!@#%&-_=:;'"<,>~`]+/g;
                const allChar = /.+/g;
                // FOR TEXTS ONLY
                $("[data-pattern*='textOnly']").on('keydown', function (event) {
                    let tmp = "";
                    if (!textOnly.test(event.key) && !specKey.includes(event.key)) {
                        event.preventDefault();
                        tmp = ("Prevented: " + event.key);
                    }
                    tmp = (event.key);
                    tmp = ("textOnly\nPattern Match: " + textOnly.test(event.key) + "\nisSpecKey: " + specKey.includes(event.key) + "\neventKey: " + event.key + "\ntextOnly var: " + textOnly);
                });
                // FOR NUMBERS ONLY
                $("[data-pattern*='numberOnly']").on('keydown', function (event) {
                    // console.log(event.key);
                    let tmp = "";
                    if ($(this).attr('type') == 'tel') {
                        if (!numberOnly.test(event.key) && event.key != "+" && !specKey.includes(event.key)) {
                            event.preventDefault();
                            tmp = ("Prevented: " + event.key);
                        }
                    } else {
                        if (!numberOnly.test(event.key) && !specKey.includes(event.key)) {
                            event.preventDefault();
                            tmp = ("Prevented: " + event.key);
                        }
                    }
                    tmp = (event.key);
                    tmp = ("numberOnly\nPattern Match: " + numberOnly.test(event.key) + "\nisSpecKey: " + specKey.includes(event.key) + "\neventKey: " + event.key + "\nnumberOnly var: " + numberOnly);
                });
                let currentPattern = $("[data-pattern*='numberOnly']").attr('pattern');
                currentPattern = currentPattern + "";
                // console.log(currentPattern);
                // try {console.log(!~$("[data-pattern*='numberOnly']").attr('pattern').indexOf("[A-Za-z\\.\\s]+"));} catch (exception) {}
                if (currentPattern.indexOf("undefined") >= 0) {
                    // FOR NUMBERS
                    if ($("[data-pattern*='numberOnly']").attr('type') == 'tel') {
                        $("[data-pattern*='numberOnly']").attr('pattern', "^+[\\d]+");  // IF TYPE IS CONTACT
                    } else {
                        $("[data-pattern*='numberOnly']").attr('pattern', "[\\d]+");    // IF TYPE ISN'T CONTACT
                    }
                    // FOR TEXTS
                    $("[data-pattern*='textOnly']").attr('pattern', "[A-Za-z\\.\\s]+");
                    // FOR SPECIAL CHARACTERS
                    $("[data-pattern*='specChar']").attr('pattern', "[\\\\\^\\$\\.\\|\\?\\*\\+\\(\\)\\[\\]\\{\\}/!@#%&-_=:;'\"<,>~`]+");
                    // FOR ALL CHARACTERS
                    $("[data-pattern='allChar']").attr('pattern', ".{" + $("[data-pattern='allChar']").attr("pattern-min") + "," + $("[data-pattern='allChar']").attr("pattern-max") + "}");
                } else {
                    // FOR NUMBERS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf("[\\d]+") >= 0)
                        $("[data-pattern*='numberOnly']").attr('pattern', $("[data-pattern*='numberOnly']").attr('pattern') + "[\\d]+");
                    // FOR TEXTS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf("[A-Za-z\\.\\s]+") >= 0)
                        $("[data-pattern*='textOnly']").attr('pattern', $("[data-pattern*='textOnly']").attr('pattern') + "[A-Za-z\\.\\s]+");
                    // FOR SPECIAL CHARACTERS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf("[\\\\\^\\$\\.\\|\\?\\*\\+\\(\\)\\[\\]\\{\\}/!@#%&-_=:;'\"<,>~`]+") >= 0)
                        $("[data-pattern*='specChar']").attr('pattern', $("[data-pattern*='specChar']").attr('pattern') + "[\\\\\^\\$\\.\\|\\?\\*\\+\\(\\)\\[\\]\\{\\}/!@#%&-_=:;'\"<,>~`]+");
                    // FOR ALL CHARACTERS
                    if ($("[data-pattern*='numberOnly']").attr('pattern').indexOf(".{" + $("[data-pattern='allChar']").attr("pattern-min") + "," + $("[data-pattern='allChar']").attr("pattern-max") + "}") >= 0)
                        $("[data-pattern='allChar']").attr('pattern', ".{" + $("[data-pattern='allChar']").attr("pattern-min") + "," + $("[data-pattern='allChar']").attr("pattern-max") + "}");
                }
                /* SPECIAL CASE: If the input is the suffix
                 * If the element is focused, it will add the 'required' attribute.
                 * If it is unfocused, it will then remove the 'required' attribute.
                 * REASON:
                 * Adding the 'required' attribute allows the 'pattern' attribute to work;
                 * but at the same time, this will require the user to provide a value. Suffix is
                 * an optional value in people's name thus, the code below. If focused, the user will
                 * be forced to follow the pattern but will not allow the form to be submitted when it is blank.
                 * If it is unfocused after being traversed or something, it will remove the 'required' tag
                 * which would render the 'pattern' attribute useless, but will allow the form to submit the
                 * value despite being blank.
                 */
                $("[name='suffix']").focus(function () {
                    $(this).attr('required', 'required');
                });
                $("[name='suffix']").focusout(function () {
                    $(this).removeAttr('required');
                });
                for (let i = 0; i < formLength; i++) {
                    $("[name='suffix']").focus(function () {
                        $(this).attr('required', 'required');
                    });
                    $("[name='suffix']").focusout(function () {
                        $(this).removeAttr('required');
                    });
                }
            }
        </script>
    </body>
</html>
