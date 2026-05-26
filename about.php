<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="./styles/styles.css">


    <style>
        figure {
            width: min-content;
            border: 3px solid #e6d3a3;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php include './inc/header.inc' ?>
    <main class="grid_layout">
        <section class="card card-1">
            <h1>About Us</h1>
            <h2>The Procrastinators</h2>
            <ul>
                <li>COS10026-Web Technology Project</li>
                <ul>
                    <li>Wednesday 10:30 to 12:30</li>
                </ul>
            </ul>
        </section>
        <section class="card card-2">
            <h2>Member Contributions and Quotes</h2>
            <dl>
                <dt>Henny Balaruban</dt>
                <dd style="color: #1b7235;"> <strong>Id: 106508364</strong></dd>
                <dd>Home Page</dd>
                <dd>Job Description Page</dd>
                <dd>Quote: Bagutte</dd>
                <dd>Translation: French type of bread</dd>
                <dt>Naveen Chemay</dt>
                <dd style="color: #1b7235;"><strong>Id: 106515050</strong></dd>
                <dd>Home Page</dd>
                <dd>Job Application Page</dd>
                <dd>Quote: Avete visto il nuovo film di Avatar?</dd>
                <dd>Translation: Yall seen that new avatar movie?</dd>
                <dt>Cooper Lourensz</dt>
                <dd style="color: #1b7235;"><strong>Id: 106520850</strong></dd>
                <dd>Home Page</dd>
                <dd>About Us Page</dd>
                <dd>Quote: 私の小さな友達に挨拶して </dd>
                <dd>Translation: Say hello to my little friend</dd>
            </dl>
        </section>
        <section class="card card-3">
            <figure>

                <img src="./styles/Images/GroupPhoto (1).jpg" alt="Group Photo" width="400">
                <figcaption>Group Photo</figcaption>
            </figure>
        </section>
        <section class="card card-4">
            <table border="1">
                <caption class="table_caption">Member Fun Fact Table </caption>
                <tr>
                    <th>Question</th>
                    <th>Henny</th>
                    <th>Naveen</th>
                    <th>Cooper</th>
                </tr>
                <tr>
                    <td>What is your favourite snack?</td>
                    <td>Cookies and Cream Ice Cream</td>
                    <td>Honey Soy Chicken Chips</td>
                    <td>Chocolate Chip Cookies</td>
                </tr>
                <tr>
                    <td>Do you have any pets?</td>
                    <td>No Pets</td>
                    <td>I Have a Cat</td>
                    <td>I Have Two Cats</td>
                </tr>
                <tr>
                    <td>what is a country you would like to travel to in the future?</td>
                    <td>Japan</td>
                    <td>Japan and Italy</td>
                    <td>Japan</td>
                </tr>
                <tr>
                    <td>Are you a morning or night person</td>
                    <td>Night Person</td>
                    <td>Night Person</td>
                    <td>Morning Person</td>
                </tr>
            </table>
        </section>
    </main>

    <?php include './inc/footer.inc' ?>
</body>

</html>