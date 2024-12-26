<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Vehicle Service Center Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #461fb3;
            color: white;
            padding: 20px;
            text-align: center;
            animation: fadeInDown 1s;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        header nav {
            text-align: right;
            overflow: hidden;
            background-color: white;
        }

        header nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 10px;
        }

        header nav a {
            color: black;
            text-decoration: none;
            font-size: 18px;
            padding: 14px 16px;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #461fb3;
        }

        main {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        section {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: black;
            border-bottom: 2px solid #461fb3;
            padding-bottom: 5px;
        }

        p {
            color: black;
        }

        iframe {
            width: 100%;
            height: 300px;
            border: none;
        }

        footer {
            background-color: #461fb3;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        
    </header>
    <main>
        <section>
            <h2>Get in Touch</h2>
            <p>Email: ihshanaushad2732@gmail.com</p>
            <p>Phone: +94 767939108</p>
            <p>Address: Thoppur, Main Street, Trincomalee, Sri Lanka</p>
            <p>Location of Our Vehicle Service Center:</p>
            <!-- Embedded Sri Lanka Map with Thoppur location from Google Maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15809.22219167625!2d81.2893154!3d8.4042349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afba794a5772943%3A0xb1e1e33fbe2cd90b!2sThoppur!5e0!3m2!1sen!2slk!4v1649255099155!5m2!1sen!2slk" allowfullscreen="" loading="lazy"></iframe>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Vehicle Service Center Management System.</p>
    </footer>
</body>
</html>
