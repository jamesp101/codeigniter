<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .announcement-container {
            position: relative;
            width: 100%;
            margin: 50px auto;
            overflow: hidden;
            border-radius: 8px;
        }

        .announcement-box {
            display: flex;
            transition: transform 0.5s ease;
            background: #F4F4F4;
            gap: 10px;
        }

        .announcement-box-item {
            flex: 0 0 calc(50% - 10px); /* Adjust width to account for gap */
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            border: 1px solid #111;
            border-radius: 8px;
            background: white;
        }
        .announcement-box-item img {
            width: 100%;
            margin-bottom: 20px;
        }

        .announcement-content {
            padding: 20px;
            display: block;
        }

        .announcement-box-item h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .announcement-box-item p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .announcement-box-item a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        .announcement-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            font-size: 24px; /* Increase size for arrow */
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .announcement-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>
    <div class="announcement-container">
        <div class="announcement-box">
            <?php foreach($neas as $nea): ?>
            <div class="announcement-box-item">
                <img src="<?= base_url('nea_files/'. $nea['NEA_Image']) ?>"/>
                <div class="announcement-content">
                <span> <?= $nea['Category'] ?> - <?= $nea['Date_Uploaded'] ?> </span>
                <h4><?= $nea['NEA_Title'] ?></h4>
                <p><?= $nea['NEA_Description'] ?></p>
                <a href="<?php echo base_url('news_and_events/' . $nea['ID_NEA']); ?>"><button class="btn btn-info">Read More...</button></a>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- Add more announcement-box items here if needed -->
        </div>
        <button class="prev announcement-btn">&#10094;</button>
        <button class="next announcement-btn">&#10095;</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let currentIndex = 0;
            const totalItems = $('.announcement-box-item').length;
            const itemsToShow = 2;
            const itemWidth = $('.announcement-box-item').outerWidth(true);
            const maxIndex = Math.ceil(totalItems / itemsToShow) - 1;

            function updateAnnouncementBox() {
                const offset =  -currentIndex * itemWidth; // Since each item takes 50% width
                $('.announcement-box').css('transform', 'translateX(' + offset + 'px)');
            }

            $('.next').click(function() {
                if (currentIndex < maxIndex) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateAnnouncementBox();
            });

            $('.prev').click(function() {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = maxIndex;
                }
                updateAnnouncementBox();
            });
        });
    </script>
</body>
</html>
