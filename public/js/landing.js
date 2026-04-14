(() => {
  const body = document.body;
  const cursor = document.getElementById('cursor');
  const ring = document.getElementById('cursorRing');
  const interactiveEls = document.querySelectorAll('a, button, .js-open-sign');

  if (cursor && ring) {
    let mx = 0;
    let my = 0;
    let rx = 0;
    let ry = 0;

    document.addEventListener('mousemove', (event) => {
      mx = event.clientX;
      my = event.clientY;
    });

    const animateCursor = () => {
      rx += (mx - rx) * 0.12;
      ry += (my - ry) * 0.12;
      cursor.style.transform = `translate(${mx - 5}px, ${my - 5}px)`;
      ring.style.transform = `translate(${rx - 18}px, ${ry - 18}px)`;
      requestAnimationFrame(animateCursor);
    };

    animateCursor();

    interactiveEls.forEach((element) => {
      element.addEventListener('mouseenter', () => {
        ring.style.width = '54px';
        ring.style.height = '54px';
        ring.style.opacity = '0.8';
      });
      element.addEventListener('mouseleave', () => {
        ring.style.width = '36px';
        ring.style.height = '36px';
        ring.style.opacity = '1';
      });
    });
  }

  const canvas = document.getElementById('starCanvas');
  if (canvas) {
    const ctx = canvas.getContext('2d');
    let width;
    let height;
    const stars = [];
    const starCount = 260;

    const resize = () => {
      width = canvas.width = window.innerWidth;
      height = canvas.height = window.innerHeight;
    };

    resize();
    window.addEventListener('resize', resize);

    for (let i = 0; i < starCount; i += 1) {
      stars.push({
        x: Math.random(),
        y: Math.random(),
        r: Math.random() * 1.4 + 0.2,
        o: Math.random() * 0.75 + 0.2,
        tw: Math.random() * Math.PI * 2,
        ts: 0.003 + Math.random() * 0.004,
      });
    }

    const draw = () => {
      ctx.clearRect(0, 0, width, height);

      const bg = ctx.createLinearGradient(0, 0, 0, height);
      bg.addColorStop(0, '#05060e');
      bg.addColorStop(0.5, '#070a18');
      bg.addColorStop(1, '#05060e');
      ctx.fillStyle = bg;
      ctx.fillRect(0, 0, width, height);

      stars.forEach((star) => {
        star.tw += star.ts;
        const twinkle = 0.5 + 0.5 * Math.sin(star.tw);
        const opacity = star.o * (0.55 + 0.45 * twinkle);
        const isGold = Math.sin(star.tw * 0.35) > 0.65;
        ctx.beginPath();
        ctx.arc(star.x * width, star.y * height, star.r, 0, Math.PI * 2);
        ctx.fillStyle = isGold
          ? `rgba(232,204,133,${opacity})`
          : `rgba(240,240,255,${opacity})`;
        ctx.fill();
      });

      requestAnimationFrame(draw);
    };

    draw();
  }

  const signs = window.COSMIC_SIGNS || {};
  const modal = document.getElementById('modal');
  const closeModalBtn = document.getElementById('closeModal');
  const modalName = document.getElementById('modal-name');
  const modalDates = document.getElementById('modal-dates');
  const modalElement = document.getElementById('modal-element');
  const modalDesc = document.getElementById('modal-desc');

  const openSignModal = (name) => {
    const sign = signs[name];
    if (!sign || !modal) {
      return;
    }

    modalName.textContent = name;
    modalDates.textContent = sign.dates;
    modalElement.textContent = sign.element;
    modalDesc.textContent = sign.desc;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    body.style.overflow = 'hidden';
  };

  const closeSignModal = () => {
    if (!modal) {
      return;
    }

    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    body.style.overflow = '';
  };

  document.querySelectorAll('.js-open-sign').forEach((element) => {
    element.addEventListener('click', () => {
      openSignModal(element.dataset.sign);
    });
  });

  if (closeModalBtn) {
    closeModalBtn.addEventListener('click', closeSignModal);
  }

  if (modal) {
    modal.addEventListener('click', (event) => {
      if (event.target === modal) {
        closeSignModal();
      }
    });
  }

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      closeSignModal();
    }
  });
})();
