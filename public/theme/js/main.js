(function($) {
    "use strict";

    // Spinner
    var spinner = function() {
        setTimeout(function() {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Sticky Navbar
    $(window).scroll(function() {
        if ($(this).scrollTop() > 45) {
            $(".navbar").addClass("sticky-top shadow-sm");
        } else {
            $(".navbar").removeClass("sticky-top shadow-sm");
        }
    });

    // Modal Video
    $(document).ready(function() {
        var $videoSrc;
        $(".btn-play").click(function() {
            $videoSrc = $(this).data("src");
        });

        $("#videoModal").on("shown.bs.modal", function(e) {
            $("#video").attr(
                "src",
                $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
            );
        });

        $("#videoModal").on("hide.bs.modal", function(e) {
            $("#video").attr("src", $videoSrc);
        });
    });

    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });

    $(".back-to-top").mousedown(function() {
        $(this).addClass("pressed"); // Tambahkan kelas pressed saat tombol ditekan
    });

    $(".back-to-top").mouseup(function() {
        $(this).removeClass("pressed"); // Hapus kelas pressed saat tombol dilepas
    });

    $(".back-to-top").click(function(event) {
        event.preventDefault(); // Mencegah perilaku default link
        $("html, body").animate({
                scrollTop: 0
            },
            100,
            "easeInOutQuad"
        );
    });


    // Pendaftaran Service Worker
    if ("serviceWorker" in navigator) {
        window.addEventListener("load", () => {
            navigator.serviceWorker
                .register("/service-worker.js")
                .then((registration) => {
                    console.log(
                        "Service Worker registered with scope:",
                        registration.scope
                    );
                })
                .catch((error) => {
                    console.log("Service Worker registration failed:", error);
                });
        });
    }

    // // Floating dots animation
    // document.addEventListener("DOMContentLoaded", function () {
    //     const container = document.querySelector(".floating-dots");
    //     for (let i = 0; i < 20; i++) {
    //         const dot = document.createElement("div");
    //         dot.className = "dot";

    //         dot.style.left = `${Math.random() * 100}%`;
    //         dot.style.animationDelay = `${Math.random() * 15}s`;

    //         container.appendChild(dot);
    //     }
    // });

    // Close dropdown on click outside
    document.addEventListener("click", function(event) {
        const dropdown = document.getElementById("navbarNav");
        if (
            !dropdown.contains(event.target) &&
            dropdown.classList.contains("show")
        ) {
            dropdown.classList.remove("show");
        }
    });

    // Initialize AOS (Animate on Scroll)
    AOS.init();
})(jQuery);