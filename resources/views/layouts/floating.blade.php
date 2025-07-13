<!-- Floating Share Button -->
<div class="floating-share">
    <!-- Tombol Feedback -->
    <button class="feedback-btn" data-label="Beri Penilaian" onclick="openFeedbackModal()">
        <i class="bi bi-hand-thumbs-up fs-2"></i>
    </button>
    <button class="share-toggle" data-label="Bagikan">
        <i class="bi bi-share-fill"></i>
    </button>
    <div class="share-options">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" class="share-btn facebook">
            <i class="bi bi-facebook"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank" class="share-btn twitter">
            <i class="bi bi-twitter-x"></i>
        </a>
        <a href="https://api.whatsapp.com/send?text={{ urlencode(Request::fullUrl()) }}" target="_blank" class="share-btn whatsapp">
            <i class="bi bi-whatsapp"></i>
        </a>
        <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}" target="_blank" class="share-btn telegram">
            <i class="bi bi-telegram"></i>
        </a>
        <a href="https://www.instagram.com/?url={{ urlencode(Request::fullUrl()) }}" target="_blank" class="share-btn instagram">
            <i class="bi bi-instagram"></i>
        </a>
    </div>
    <button id="myCustomTrigger" class="share-toggle" data-label="Aksesibilitas">
        <i class="bi bi-universal-access-circle fs-2"></i>
    </button>
</div>

<!-- JAVASCRIPT FLOATING SHARE BUTTON -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.querySelector(".share-toggle");
        const shareOptions = document.querySelector(".share-options");

        toggleBtn.addEventListener("click", function () {
            shareOptions.classList.toggle("active");
        });

        document.addEventListener("click", function (event) {
            if (!toggleBtn.contains(event.target) && !shareOptions.contains(event.target)) {
                shareOptions.classList.remove("active");
            }
        });
    });
</script>

<script>
  (function(d){
    var s = d.createElement("script");
    s.setAttribute("data-account", "FCl1e8LsIe");
    s.setAttribute("data-trigger", "myCustomTrigger");
    s.setAttribute("data-color", "#154F5B");
    s.setAttribute("src", "https://cdn.userway.org/widget.js");
    (d.body || d.head).appendChild(s);
  })(document);
</script>