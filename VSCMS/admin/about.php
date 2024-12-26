<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>About Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        header {
            background-color: white;
            color: rgb(0, 0, 0);
            padding: 10px 0;
            position: fixed;
            width: 100%;
            z-index: 100;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 5px auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #40b736;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links a {
            color: rgb(0, 0, 0);
            padding: 10px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links a:hover {
            background-color: #40b736;
            border-radius: 4px;
            color: white;
        }

        /* Main Content */
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* About Section */
        .about {
            background: linear-gradient(360deg, rgb(245, 255, 245) 0%, rgb(173, 252, 163) 100%);
            padding: 100px 20px 20px 20px;
            text-align: center;
            margin-top: 60px; /* To account for the fixed header */
        }

        .about h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 1rem;
            color: #323030;
            max-width: 800px;
            margin: 0 auto;
        }

        .about-info {
            margin: 2rem 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: left;
        }

        .about-img {
            width: 20rem;
            height: 20rem;
        }

        .about-img img {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            object-fit: cover;
        }

        .about-info p {
            font-size: 1.3rem;
            margin: 0 2rem;
            text-align: justify;
        }

        button {
            border: none;
            outline: 0;
            padding: 10px;
            margin: 2rem;
            font-size: 1rem;
            color: white;
            background-color: #40b736;
            text-align: center;
            cursor: pointer;
            width: 15rem;
            border-radius: 4px;
        }

        button:hover {
            background-color: #1f9405;
        }

        /* Footer */
        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto; /* Push footer to the bottom */
        }

        @media (max-width: 768px) {
            nav {
                display: block;
            }

            .logo {
                text-align: center;
            }

            .nav-links {
                margin-top: 1rem;
                justify-content: space-between;
            }

            .nav-links li {
                margin-right: 0;
            }

            .about h1 {
                font-size: 2rem;
            }

            .about p {
                font-size: 0.9rem;
            }

            .about-info {
                flex-direction: column;
                text-align: center;
            }

            .about-img {
                width: 60%;
                height: 60%;
                margin-bottom: 1rem;
            }

            .about-info p {
                margin: 1rem 2rem;
            }

            .about-info button {
                margin: 1rem 2rem;
                width: 10rem;
            }

            .team {
                margin: 0 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                Vehicle Service Center Management System
            </div>
        </nav>
    </header>

    <main>
        <section class="about">
            <h1>About Us</h1>
            <div class="about-info">
                <div class="about-img">
                    <img src="imgs/images.png" alt="Service Center">
                </div>
                <div>
                    <p>Welcome to Our Service Center, your trusted partner for comprehensive 
                        vehicle maintenance and repair services. With years of experience and a team of 
                        certified professionals, we are committed to delivering exceptional service quality 
                        and customer satisfaction. Our state-of-the-art facility is equipped with the latest 
                        diagnostic tools and technology, ensuring that your vehicle receives the best care 
                        possible. Whether it's routine maintenance, complex repairs, or performance enhancements,
                        we are dedicated to keeping your vehicle running smoothly and safely. At Our Service Center,
                        we drive excellence.</p>
                    <button>Read More...</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 Vehicle Service Center Management System. All Rights Reserved.</p>
    </footer>
</body>

</html>
