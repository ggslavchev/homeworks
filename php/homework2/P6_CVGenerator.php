<!DOCTYPE html>
<html>
<head>

    <?php
    if (isset($_GET['submit'])) {

        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $gender = $_GET['gender'];
        $birthDate = $_GET['birthDate'];
        $nationality = $_GET['nationality'];

        $errFirstName = validateElement($firstName,false)? null: 'Invalid First Name';
        $errLastName = validateElement($lastName,false)?null: 'Invalid Last Name';
        $errEmail =  filter_var($email, FILTER_VALIDATE_EMAIL)?null:'Invalid Email';
        $errPhone = validatePhone($phone) ? null : 'Invalid Phone';
        $errGender = isset($gender)?null:'Please select gander';

        $companyName = $_GET['companyName'];
        $fromDate = $_GET['fromDate'];
        $toDate = $_GET['toDate'];

        $programmingLang = $_GET['programmingLang'];
        $skillLevel = $_GET['skillLevel'];
        $languages = $_GET['languages'];
        $langComprehension = $_GET['langComprehension'];
        $langReading = $_GET['langReading'];
        $langWriting = $_GET['langWriting'];

        $errLang = null;

        if (count($languages) > 0){
            foreach ($languages as $lang){
                if (!validateElement($lang,false)){
                    $errLang = 'Invalid Language';
                }
            }
        } else $errLang = 'Invalid Language';



        $errCompanyName = validateElement($companyName,true)?null:'Invalid Name';

        if (!(isset($errFirstName) || isset($errLastName) || isset($errEmail) || isset ($errPhone))){

            $personalInfo = "";
            $personalInfo .= "<table><thead><tr><th colspan=\"2\">Personal Information</th></tr></thead><tbody>";
            $personalInfo .= "<tr><td>First Name</td><td>$firstName</td></tr>";
            $personalInfo .= "<tr><td>Last Name</td><td>$lastName</td></tr>";
            $personalInfo .= "<tr><td>Email</td><td>$email</td></tr>";
            $personalInfo .= "<tr><td>Phone Number</td><td>$phone</td></tr>";
            $personalInfo .= "<tr><td>Gender</td><td>$gender</td></tr>";
            $personalInfo .= "<tr><td>Birth Date </td><td>$birthDate</td></tr>";
            $personalInfo .= "<tr><td>Nationality</td><td>$nationality</td></tr>";
            $personalInfo .= "</tbody></table>";
            echo $personalInfo;
        } else $personalInfo = null;
        if (!isset($errCompanyName)) {
            $lastWork = "";
            $lastWork .= "<table><thead><tr><th colspan=\"2\">Last Work Position</th></tr></thead><tbody>";
            $lastWork .= "<tr><td>Company Name</td><td>$companyName</td></tr>";
            $lastWork .= "<tr><td>From Date</td><td>$fromDate</td></tr>";
            $lastWork .= "<tr><td>To Date</td><td>$toDate</td></tr>";
            $lastWork .= "</tbody></table>";
            echo $lastWork;
        } else $lastWork = null;

        if (count($programmingLang)>0) {
            $progSkill = "";
            $progSkill .= "<table><thead><tr><th colspan=\"2\">Computer Skills</th></tr></thead>";
            $progSkill .= "<tbody><tr><td>Programming Languages</td>";
            $progSkill .= "<td><table><thead><tr><th>Language</th><th>Skill Level</th></tr></thead>";
            $progSkill .= "<tbody>";
            for ($i = 0; $i < count($programmingLang); $i++) {
                $progSkill .= "<tr><td>$programmingLang[$i]</td><td>$skillLevel[$i]</td></tr>";
            }
            $progSkill .= "</tbody></table></td></tr></tbody></table>";
            echo($progSkill);
        } else $progSkill = null;

        if (!isset($errLang)){
            $otherSkill = "";
            $otherSkill .= "<table><thead><tr><th colspan=\"2\">Other Skills</th></tr></thead>";
            $otherSkill .= "<tbody><tr><td>Languages</td><td><table><thead>";
            $otherSkill .="<tr><th>Language</th><th>Comprehension</th><th>Reading</th><th>Writing</th></tr></thead>";
            $otherSkill .="<tbody>";
            for ($i=0; $i<count($languages); $i++){
                $otherSkill .= "<tr><td>$languages[$i]</td><td>$langComprehension[$i]</td><td>$langReading[$i]</td><td>$langWriting[$i]</td></tr>";
            }

            $otherSkill .= "</tbody></table></td></tr>";
            if (isset($_GET['driver'])) {
                $driver = $_GET['driver'];
                $categories = implode(', ', $driver);
                $otherSkill .=  "<tr><td>Driver's license</td><td>$categories</td></tr>";
            }

            $otherSkill .="</tbody></table>";


            echo $otherSkill;
        }else $otherSkill = null;

    }

    function validateElement($data, $digits )
    {
        $length = strlen($data);
        if ($length >= 2 && $length <= 20){
            if ($digits) {
                $isMatch = !preg_match('/[^A-Za-z0-9]/', $data);
            }else {
                $isMatch = !preg_match('/[^A-Za-z]/', $data);
            }
            return $isMatch;
        } else return false;
    }

    function validatePhone($phone)
    {
        $isMatch = !preg_match('/[^0-9 +-]/', $phone) && $phone !='';
        return $isMatch ? true : false;
    }
    ?>


    <title>CV Generator</title>
    <script type="text/javascript">
        var compLangID = 1;
        var LangID = 1;

        function removeCompLang(parentID){
            if (compLangID > 1) {
                var id = 'C'+compLangID;
                var parent = document.getElementById(parentID);
                var currID = document.getElementById(id);
                parent.removeChild(currID);
                compLangID -= 1;
            }
        }
        function removeLang(parentID){
            if (LangID > 1) {
                var id = 'L'+LangID;
                var parent = document.getElementById(parentID);
                var currID = document.getElementById(id);
                parent.removeChild(currID);
                LangID -= 1;
            }
        }

        function addCompLang(parentID){
            compLangID += 1;
            var id = 'C'+compLangID;
            var parent = document.getElementById(parentID);
            var element = document.createElement('article');
            element.setAttribute('id',id);
            element.innerHTML = '<input type="text" name="programmingLang[]" />' +
                '<select name="skillLevel[]">' +
                    '<option value="Beginner">Beginner</option>' +
                    '<option value="Programmer">Programmer</option>' +
                    '<option value="Ninja">Ninja</option>' +
                '</select>';
            parent.appendChild(element);
        }

        function addLang(parentID){
            LangID += 1;
            var id = 'L'+LangID;
            var parent = document.getElementById(parentID);
            var element = document.createElement('article');
            element.setAttribute('id',id);

            element.innerHTML =
                '<input type="text" name="languages[]" />' +
                '<select name="langComprehension[]">' +
                    '<option value="">-Comprehension-</option>' +
                    '<option value="beginner">beginner</option>' +
                    '<option value="intermediate">intermediate</option>' +
                    '<option value="advanced">advanced</option>' +
                '</select>' +
                '<select name="langReading[]">' +
                    '<option value="">-Reading-</option>' +
                    '<option value="beginner">beginner</option>' +
                    '<option value="intermediate">intermediate</option>' +
                    '<option value="advanced">advanced</option>' +
                '</select>' +
                    '<select name="langWriting[]">' +
                    '<option value="">-Writing-</option>' +
                    '<option value="beginner">beginner</option>' +
                    '<option value="intermediate">intermediate</option>' +
                    '<option value="advanced">advanced</option>' +
                '</select>';

            parent.appendChild(element);
        }

    </script>

    <style>
        form {
            width: 600px;
        }
        input {
            margin-bottom: 10px;
            margin-right: 10px;
        }
        select {
            margin: 0px 10px 0px 0px;
        }
        span {
            color: red;
        }
        table, td, th {
            box-sizing: border-box;
            border: solid 1px black;
        }
    </style>
</head>
<body>
    <form method="get" action="">

        <fieldset>
            <legend>Personal Information</legend>
            <input type="text" name="firstName" placeholder="First Name"
                   value="<?php echo htmlentities(isset($_GET['firstName'])?$_GET['firstName']:'') ?>"/>
                   <?php if(isset($errFirstName)) echo "<span>$errFirstName</span>" ?>
            <br/>

            <input type="text" name="lastName" placeholder="Last Name"
                   value="<?php echo htmlentities(isset($_GET['lastName'])?$_GET['lastName']:'') ?>"/>
                    <?php if(isset($errLastName)) echo "<span>$errLastName</span>" ?>
            <br/>
            <input type="text" name="email" placeholder="Email"
                   value="<?php echo htmlentities(isset($_GET['email'])?$_GET['email']:'') ?>"/>
                   <?php if(isset($errEmail)) echo "<span>$errEmail</span>" ?>
            <br/>
            <input type="text" name="phone" placeholder="Phone Number"
                   value="<?php echo htmlentities(isset($_GET['phone'])?$_GET['phone']:'') ?>"/>
                   <?php if(isset($errPhone)) echo "<span>$errPhone</span>" ?>
            <br/>
            <label for="female">Female</label>
            <input type="radio" name="gender" id="female" value="female" checked="checked"/>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="male" value="male"/>
                   <?php if(isset($errGender)) echo "<span>$errGender</span>" ?>
            <br/>
            <label for="birthdate">Birth Date</label><br/>
            <input type="date" name="birthDate" id="birthdate" placeholder="dd/mm/yyyy"/><br/>
            <label for="national">Nationality</label><br/>
            <select name="nationality" id="national">
                <option value="Bulgarian">Bulgarian</option>
                <option value="British">British</option>
                <option value="French">French</option>
                <option value="German">German</option>
                <option value="Russian">Russian</option>
            </select>
        </fieldset>

        <fieldset>
            <legend>Last Work Position</legend>
            <label for="company">Company Name</label>
            <input type="text" name="companyName"  id="company"/><br/>
            <label for="fromdate">From</label>
            <input type="date" name="fromDate" id="fromdate" placeholder="dd/mm/yyyy"/><br/>
            <label for="todate">To  </label>
            <input type="date" name="toDate" id="todate" placeholder="dd/mm/yyyy"/>
        </fieldset>

        <fieldset>
            <legend>Computer Skills</legend>
            <p style="margin: 0px; padding-bottom: 10px ">Programming Languages</p>

            <section id="comp-lang-id">
                <article id="C1">
                    <input type="text" name="programmingLang[]" style="margin-right: 6px"/>
                    <select name="skillLevel[]" id="skill">
                        <option value="beginner">Beginner</option>
                        <option value="programmer">Programmer</option>
                        <option value="ninja">Ninja</option>
                    </select>
                </article>
            </section>
            <input type="button" onclick="removeCompLang('comp-lang-id')" value="Remove Language" />
            <input type="button" onclick="addCompLang('comp-lang-id')" value="Add Language"/>

        </fieldset>

        <fieldset>
            <legend>Other Skills</legend>
            <p style="margin: 0px; padding-bottom: 10px ">Languages</p>

            <section id="lang-id">
                <article id="L1">
                    <input type="text" name="languages[]" style="margin-right: 7px"/>
                    <select name="langComprehension[]" style="margin-right: 5px">
                        <option value="">-Comprehension-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                    <select name="langReading[]" style="margin-right: 5px">
                        <option value="">-Reading-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                    <select name="langWriting[]" style="margin-right: 5px">
                        <option value="">-Writing-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                </article>
            </section>

            <input type="button" onclick="removeLang('lang-id')" value="Remove Language" />
            <input type="button" onclick="addLang('lang-id')" value="Add Language"/>
            <p>Driver's License</p>

            <label for="b">B</label>
            <input type="checkbox" name="driver[]" value="B" id="b" />
            <label for="a">A</label>
            <input type="checkbox" name="driver[]" value="A" id="a" />
            <label for="c">C</label>
            <input type="checkbox" name="driver[]" value="C" id="c" />
        </fieldset>
        <input type="submit" name="submit" value="Generate CV"/>
    </form>
</body>
</html>

