</main>

<footer>
  <p>© 2025 Tradesphare.com | All Rights Reserved</p>
</footer>

<!-- ====== Theme Toggle (Light / Dark) ====== -->
<script>
  const btn = document.getElementById('themeToggle');

  function updateIcon() {
    if (document.body.classList.contains('dark')) {
      btn.textContent = '☀️';
    } else {
      btn.textContent = '🌙';
    }
  }

  if (btn) {
    btn.addEventListener('click', () => {
      document.body.classList.toggle('dark');
      localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
      updateIcon();
    });

    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark');
    }
    updateIcon();
  }
</script>

<!-- ====== Fade-in on Scroll ====== -->
<script>
  const fadeElems = document.querySelectorAll('.fade-in');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add('visible');
    });
  });
  fadeElems.forEach(el => observer.observe(el));
</script>

<!-- ====== Infinite Auto Slider (Final Version) ====== -->
<script>
  const slider = document.querySelector('.slider-container');
  if (slider) {
    const slides = document.querySelectorAll('.slide');
    let isPaused = false;

    // نكرّر العناصر لمنع الفراغ
    slides.forEach(slide => {
      const clone = slide.cloneNode(true);
      slider.appendChild(clone);
    });

    let position = 0;
    const speed = 0.4; // غيّر السرعة كما تريد (0.2 أبطأ - 1 أسرع)

    function moveSlider() {
      if (!isPaused) {
        position -= speed;
        if (Math.abs(position) >= slider.scrollWidth / 2) {
          position = 0;
        }
        slider.style.transform = `translateX(${position}px)`;
      }
      requestAnimationFrame(moveSlider);
    }

    slider.addEventListener('mouseenter', () => (isPaused = true));
    slider.addEventListener('mouseleave', () => (isPaused = false));

    moveSlider();
  }
</script>
<script>
// ====== Smooth Parallax Background Effect ======
window.addEventListener('scroll', () => {
  const hero = document.querySelector('.hero');
  if (!hero) return;
  const offset = window.scrollY * 0.3; // كلما زاد الرقم زادت الحركة
  hero.style.backgroundPositionY = `${offset}px`;
});
</script>
<!-- ====== Toast Notification ====== -->
<div id="toast" class="toast"></div>

<script>
function showToast(message, type = 'success') {
  const toast = document.getElementById('toast');
  toast.textContent = message;
  toast.className = `toast show ${type}`;
  setTimeout(() => toast.className = 'toast', 3000);
}
</script>


<script>
function showToast(message, type = 'success') {
  const toast = document.getElementById('toast');
  toast.textContent = message;
  toast.className = `toast show ${type}`;
  setTimeout(() => toast.className = 'toast', 3000);
}
</script>
<script>
const btn = document.getElementById('changePassBtn');
const modal = document.getElementById('changePassModal');
const closeModal = document.getElementById('closeModal');

if (btn && modal && closeModal) {
  btn.onclick = () => modal.style.display = 'flex';
  closeModal.onclick = () => modal.style.display = 'none';
  window.onclick = (e) => { if (e.target === modal) modal.style.display = 'none'; }
}
</script>

</body>
</html>

