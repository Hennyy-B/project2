<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <style>
        .application-form {
            width: 100%;
            background: #ffffff;
            border-radius: 24px;
            padding: 28px 30px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
            display: grid;
            gap: 22px;
        }
    </style>

</head>

<body>
    <?php include './inc/header.inc' ?>

    <main class="page-wrapper">
        <form class="application-form" action="submit_application.php" method="post">
            <fieldset>
                <legend>Customer details</legend>
                <p>
                    <label for="refnumb"> Job reference number </label>
                    <input type="text" id="refnumb" name="refnumb" pattern=".{7,10}" required="required">
                </p>
            </fieldset>

            <fieldset>
                <legend>Personal details</legend>
                <p class="row2">
                    <label for="firstname"> First Name </label>
                    <input type="text" id="firstname" name="firstname" pattern="^[a-zA-Z]+$" required="required">
                    <label for="lastname"> Last Name </label>
                    <input type="text" id="lastname" name="lastname" pattern="^[a-zA-Z]+$" required="required">
                </p>

                <p>
                    <label for="dob"> Date of Birth </label>
                    <input type="date" id="dob" name="dob" required="required">
                </p>
            </fieldset>
            <fieldset>
                <legend>Gender</legend>
                <p>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male"> Male </label>

                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female"> Female </label>

                    <input type="radio" id="nonbinary" name="gender" value="Non-binary">
                    <label for="nonbinary"> Non-binary </label>
                </p>
            </fieldset>
            <fieldset>
                <legend>Address</legend>
                <p class="row2">
                    <label for="street">Street Address</label>
                    <input type="text" id="street" name="street" pattern=".{7,10}" required="required">
                    <label for="suburb">Suburb</label>
                    <input type="text" id="suburb" name="suburb" pattern=".{2,50}" required="required">
                </p>
                <p class="row2">
                    <label for="state">State</label>
                    <select id="state" name="state" required="required">
                        <option value="">Please select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>

                    <label for="postcode">Postcode</label>
                    <input type="text" id="postcode" name="postcode" pattern="^\d{4}$" required="required">
                </p>
            </fieldset>

            <fieldset>
                <legend>Contact details</legend>
                <p>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required="required">
                </p>
                <p>
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" pattern="^\d{10}$" required="required">
                </p>
            </fieldset>

            <fieldset>
                <legend>Skills</legend>
                <p>
                    <label for="skills">Skill list</label>
                    <input type="text" id="skills" name="skills" pattern="^[a-zA-Z\s,]+$" required="required">
                </p>
            </fieldset>

            <input type="submit" value="Submit Application">
        </form>
    </main>

    <?php include './inc/footer.inc' ?>
</body>

</html>