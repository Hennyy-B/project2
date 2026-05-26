<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Openings</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <style>
        .job-summary {
            display: flex;
            justify-content: space-between;
        }

        .job-summary-card,
        .application-tips-card {
            width: 25%;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include './inc/header.inc' ?>

    <main>
        <div class="job-summary">
            <div class="job-summary-card card">
                <h3>Job Summary</h3>
                <p class="job-count">Currently 2 available</p>
            </div>
            <aside class="application-tips-card card">
                <h3>Application Tips</h3>
                <ul style="margin: 0; padding-left: 18px;">
                    <li>Ensure your resume is up-to-date with your experience and availability</li>
                    <li>Double check in ensuring Reference Number is correct</li>
                </ul>
            </aside>
        </div>
        <div class="job-listing">
            <section class="job1 card">
                <h4>Reference Number: <em>FW45W</em></h4>
                <h3>E-Commerce Manager</h3> <!-- Job and Job Info found from https://indeed.com  -->

                <p>You will be responsible for overseeing on our Online Store operations, premarily focusing on: ways to
                    drive
                    up sales, whilst keeping user experience in mind, and managing your E-Commerce team to work
                    flawlessly and
                    in conjuntion. </p>
                <p><em>Salary: </em>$110,000 - $130,000 per year</p>
                <p><em>Reporting to: </em>Commerce Director</p>

                <p><strong>Key Responsibilities</strong></p>
                <ol>
                    <li>Delegating Key Tasks to Staff, and ensuring they are completed efficiently and effectively.</li>
                    <li>Co-ordinate with marketing and production managers to ensure seamless operations.</li>
                    <li>Develop and implement strategies to improve online sales and customer experience.</li>
                </ol>

                <p><strong>Essential Requirements</strong></p>
                <ul>
                    <li>Experience in e-commerce management</li>
                    <li>Strong Leadership</li>
                    <li>Adept Levels of Communication</li>
                    <li>Experience with Shopify</li>
                </ul>
                <p><strong>Preferable Requirements</strong></p>
                <ul>
                    <li>Design - Marketing Experience</li>
                    <li>Knowledge on how Production runs</li>
                </ul>

                <a href="apply.html" class="apply-btn">Apply Now</a>
            </section>

            <section class="job2 card">
                <h4>Reference Number: <em>FKL3W</em></h4>
                <h3>E-Commerce Operations Associate</h3> <!-- Job and Job Info found from https://indeed.com  -->

                <p>Your main responsibility is picking and packing orders accurately and efficiently for our customers.
                </p>
                <p><em>Salary:</em> $50,000 - $60,000 per year</p>
                <p><em>Reporting to:</em> E-Commerce Manager</p>

                <p><strong>Key Responsibilities</strong></p>
                <ol>
                    <li>Flawlessly picking and packing orders for our customers.</li>
                    <li>Ensuring orders are shipped on time, and accurately.</li>
                    <li>Maintaining a clean and organized workspace.</li>
                </ol>

                <p><strong>Essential Requirements</strong></p>
                <ul>
                    <li>Experience in picking and packing orders</li>
                    <li>Ability to work effectively on a quota basis</li>
                    <li>Ability to lift and move at minimum 20KG Boxes</li>
                </ul>
                <p><strong>Preferable Requirements</strong></p>
                <ul>
                    <li>Knowledge of shipping processes</li>
                    <li>Quick Learner</li>
                </ul>

                <a href="apply.html" class="apply-btn">Apply Now</a>
            </section>
        </div>
    </main>

    <?php include './inc/footer.inc' ?>
</body>

</html>