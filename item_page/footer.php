    <footer class="container-footer">
        <div class="foot">
            <div class="foot-main">
                <div class="logo">
                    <h1>ChonGame<span>.com</span></h1>
                </div>
                <div class="foot-if">
                    <p>
                        <b>LƯU Ý QUAN TRỌNG:</b> Website này được xây dựng với mục đích duy nhất là phục vụ cho bài tiểu
                        luận
                        chuyên ngành. Mọi tính năng và nội dung hiển thị chỉ mang tính chất minh họa, thử nghiệm và
                        không có
                        giá trị sử dụng thực tế. Rất mong quý bạn đọc lưu ý để tránh nhầm lẫn.
                    </p>
                </div>
            </div>

            <div class="foot-aside">
                <h3>Theo dõi chúng tôi</h3>
                <div class="foot-link">
                    <i class="fa-brands fa-facebook-f"></i><span>Facebook XXX.XXX</span>
                </div>
                <div class="foot-link">
                    <i class="fa-brands fa-instagram"></i><span>Instagram XXX.XXX</span>
                </div>
                <div class="foot-link">
                    <i class="fa-brands fa-tiktok"></i><span>TikTok XXX.XXX.XX</span>
                </div>
                <div class="foot-link">
                    <i class="fa-regular fa-envelope"></i><span>Email XXX.XXX.XXX.XXX</span>
                </div>
                <div class="foot-link">
                    <i class="fa-brands fa-youtube"></i><span>Youtube XXX.XXX</span>
                </div>
            </div>

            <div class="foot-aside">
                <h3>Hỗ trợ khách hàng</h3>
                <div class="foot-link">
                    <i class="fa-solid fa-angle-right"></i><span>Điều khoản sử dụng</span>
                </div>
                <div class="foot-link">
                    <i class="fa-solid fa-angle-right"></i><span>Quy chế hoạt động</span>
                </div>
                <div class="foot-link">
                    <i class="fa-solid fa-angle-right"></i><span>Chính sách thanh toán</span>
                </div>
                <div class="foot-link">
                    <i class="fa-solid fa-angle-right"></i><span>Chính sách bảo hành</span>
                </div>
                <div class="foot-link">
                    <i class="fa-solid fa-angle-right"></i><span>Chính sách đổi trả</span>
                </div>
            </div>

            <div class="foot-aside">
                <h3>Về chúng tôi</h3>
                <div class="foot-link">
                    <i class="fa-solid fa-angle-right"></i><span>Giới thiệu</span>
                </div>
                <div class="foot-link">
                    <i class="fa-solid fa-angle-right"></i><span>Liên hệ</span>
                </div>
            </div>
        </div>
    </footer>

    <button id="backToTop" title="Quay lại đầu trang">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script>
        var mybutton = document.getElementById("backToTop");

        // Hiện nút khi cuộn xuống 300px
        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        };

        // Cuộn mượt lên đầu trang
        mybutton.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>

    <style>
        #backToTop {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999; /* Để luôn nằm trên cùng */
            border: none;
            outline: none;
            background-color: var(--main-red, #ff0000); 
            color: white;
            cursor: pointer;
            padding: 12px 15px;
            border-radius: 50%;
            font-size: 18px;
        }
    </style>