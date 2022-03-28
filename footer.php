
<style>
	﻿.container-footer {
    max-width: 1170px;
    margin: auto;
}

.row-footer {
    display: flex;
    flex-wrap: wrap;
}

.footer-col ul {
    list-style: none;
}

.footer {
    background-color: #24262b;
    padding: 40px 0;
    margin-top:15%;
   
  
}

.footer-col {
    width: 25%;
    padding: 0 15px;
}

    .footer-col h4 {
        font-size: 18px;
        color: #ffffff;
        text-transform: capitalize;
        margin-bottom: 35px;
        font-weight: 500;
        position: relative;
    }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #e91e63;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }

    .footer-col ul li a {
        font-size: 16px;
        text-transform: capitalize;
        color: #ffffff;
        text-decoration: none;
        font-weight: 300;
        color: #bbbbbb;
        display: block;
        transition: all 0.3s ease;
    }

        .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
        }

    .footer-col .social-links a {
        display: inline-block;
        height: 20px;
        width: 40px;
        background-color: rgba(255,255,255,0.2);
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #ffffff;
        transition: all 0.5s ease;
    }

        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }

/* /*responsive*/ */

    .footer-col {
        width: 50%;
        margin-bottom: 30px;
    }


@media(max-width: 574px) {
    .footer-col {
        width: 100%;
    }
}
</style>



<footer class="footer">
        <div class="container-footer">
            <div class="row-footer">
                <div class="footer-col">
                    <h4>MUA BÁN Ô TÔ</h4>
                    <ul>
                        <li><a href="#">Quy chế hoạt động</a></li>
                        <li><a href="#">Điều khoản sử dụng</a></li>
                        <li><a href="#">Mua hàng an toàn</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Hỗ trợ mua bán</h4>
                    <ul>
                        <li><a href="#">Báo giá quảng cáo</a></li>
                        <li><a href="#">Hỗ trợ đăng tin</a></li>
                        <li><a href="#">Địa điểm đăng tin</a></li>
                        <li><a href="#">Tin tức</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Thông tin mua bán</h4>
                    <ul>
                        <li><a href="#">Báo mua & bán TPHCM</a></li>
                        <li><a href="#">Báo mua & bán Hà Nội</a></li>
                        <li><a href="#">Cẩm nang mua bán</a></li>
                        <li><a href="#">Môi giới bất động sản</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Liên Kết</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</body>
</html>

