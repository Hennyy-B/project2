<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <style>
        h1 {
            text-align: center;
            padding: 30px 10px;
            font-size: 48px;
            margin: 0;
            color: #333;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <?php include './inc/header.inc' ?>
    <main class="home_container">

        <h1>Commercalify</h1>

        <!-- ChatGPT was used for Slogan, description and table conentents -->
        <section class="intro">
            <p style="font-size: 20px;">Commercalify Powering Seamless Digital Shopping.</p>

            <p>Commercalify is a forward-thinking e-commerce and digital retail platform dedicated to delivering smooth,
                intuitive, and engaging online shopping experiences. Our mission is to connect customers with products
                through innovative technology, user-friendly design, and efficient digital workflows.</p>

            <p>As we expand our technical and user experience teams, Commercalify continues to enhance customer-facing
                websites, optimize product listings, and streamline online application processes. By combining smart
                development with customer-centric design, we aim to make digital retail faster, simpler, and more
                accessible
                for everyone.</p>
            <h2>Acknowledgement of Country</h2>
            <p>We respectfully acknowledge the Wurundjeri People of the Kulin Nation, who
                are the Traditional Owners of the land on which Swinburne's Australian
                campuses are located in Melbourne's east and outer-east, and pay our
                respect to their Elders past, present and emerging.
                We are honoured to recognise our connection to Wurundjeri Country,
                history, culture, and spirituality through these locations, and strive to ensure
                that we operate in a manner that respects and honours the Elders and
                Ancestors of these lands.
                We also respectfully acknowledge Swinburne's Aboriginal and Torres Strait
                Islander staff, students, alumni, partners and visitors.
                We also acknowledge and respect the Traditional Owners of lands across
                Australia, their Elders, Ancestors, cultures, and heritage, and recognise the
                continuing sovereignties of all Aboriginal and Torres Strait Islander Nations.</p>
        </section>
        <section class="product_section">
            <h2>Product Catalog</h2>
            <table border="1" cellpadding="8" class="product_table">
                <tr>
                    <th colspan="4">Commercalify Product Catalog</th>
                </tr>
                <tr>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>

                <tr>
                    <td rowspan="3">Electronics</td>
                    <td>Bluetooth Headphones</td>
                    <td>$79</td>
                    <td>45</td>
                </tr>
                <tr>
                    <td>Smart Watch</td>
                    <td>$120</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>Portable Charger</td>
                    <td>$25</td>
                    <td>100</td>
                </tr>

                <tr>
                    <td rowspan="3">Clothing</td>
                    <td>Men's T-Shirt</td>
                    <td>$20</td>
                    <td>75</td>
                </tr>
                <tr>
                    <td>Women's Jacket</td>
                    <td>$65</td>
                    <td>40</td>
                </tr>
                <tr>
                    <td>Running Shoes</td>
                    <td>$90</td>
                    <td>25</td>
                </tr>

                <tr>
                    <td rowspan="2">Home & Living</td>
                    <td>Desk</td>
                    <td>$70</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>Coffee Mug Set</td>
                    <td>$18</td>
                    <td>120</td>
                </tr>

            </table>
        </section>

        <section class="search_section">
            <form class="search_form">
                <input type="text" placeholder="Search Commercalify..." name="search">
                <button type="submit">Search</button>
            </form>
        </section>
    </main>
    <?php include './inc/footer.inc' ?>
</body>

</html>