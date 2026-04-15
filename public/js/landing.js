(() => {
  const safeStorage = {
    get(key) {
      try {
        return window.localStorage.getItem(key);
      } catch (error) {
        return null;
      }
    },
    set(key, value) {
      try {
        window.localStorage.setItem(key, value);
      } catch (error) {
        // Ignore storage failures in lightweight mode.
      }
    },
  };

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

    // Fixed real-ish constellation shapes (normalized 0-1 coords)
    const constellations = [
      // Orion-like
      { pts:[[0.12,0.06],[0.15,0.10],[0.11,0.14],[0.18,0.14],[0.20,0.08],[0.14,0.18],[0.17,0.22]], lines:[[0,1],[1,2],[1,3],[3,4],[1,5],[5,6]] },
      // Dipper-like left
      { pts:[[0.68,0.04],[0.74,0.05],[0.79,0.07],[0.83,0.06],[0.83,0.11],[0.79,0.12],[0.74,0.11]], lines:[[0,1],[1,2],[2,3],[3,4],[4,5],[5,6],[6,1]] },
      // Cross shape right
      { pts:[[0.88,0.18],[0.92,0.14],[0.96,0.18],[0.92,0.22],[0.92,0.18]], lines:[[0,4],[1,4],[2,4],[3,4]] },
      // Triangle lower left
      { pts:[[0.08,0.38],[0.16,0.32],[0.22,0.40],[0.14,0.44]], lines:[[0,1],[1,2],[2,3],[3,0]] },
      // Cassiopeia-like top center
      { pts:[[0.35,0.03],[0.40,0.07],[0.45,0.03],[0.50,0.07],[0.55,0.03]], lines:[[0,1],[1,2],[2,3],[3,4]] },
      // Scorpius tail lower right
      { pts:[[0.78,0.42],[0.82,0.38],[0.87,0.40],[0.90,0.36],[0.93,0.39],[0.91,0.44]], lines:[[0,1],[1,2],[2,3],[3,4],[4,5]] },
    ];

    // === Fiery Meteors ===
    const meteors = [];
    function spawnMeteor() {
      // Random angle: mostly diagonal top-left to bottom-right, some variation
      const angle = (Math.PI / 5) + (Math.random() - 0.5) * (Math.PI / 8);
      const startX = Math.random() * width * 1.2 - width * 0.1;
      const startY = -20 - Math.random() * 60;
      const speed = 12 + Math.random() * 18;
      const length = 90 + Math.random() * 120;
      const size = 1.5 + Math.random() * 2;
      // Fire color: white core, orange mid, red/transparent tail
      meteors.push({ x: startX, y: startY, vx: Math.cos(angle)*speed, vy: Math.sin(angle)*speed,
        length, size, life: 1.0, decay: 0.008 + Math.random()*0.006,
        firePhase: Math.random()*Math.PI*2 });
    }
    // Spawn interval: 3-8 seconds apart
    let nextMeteorTime = Date.now() + 2000 + Math.random()*3000;

    let scrollY = 0;
    window.addEventListener('scroll', () => scrollY = window.scrollY);
    let t = 0;


    const draw = () => {
      ctx.clearRect(0, 0, width, height);

      const bg = ctx.createLinearGradient(0, 0, 0, height);
      bg.addColorStop(0, '#05060e');
      bg.addColorStop(0.5, '#070a18');
      bg.addColorStop(1, '#05060e');
      ctx.fillStyle = bg;
      ctx.fillRect(0, 0, width, height);


      // ── Milky Way band ── diagonal soft glow across hero
      const mwAngle = Math.PI * 0.18;
      const mwCx = width * 0.5, mwCy = height * 0.13;
      const mwLen = width * 4.0;   // extend FAR beyond edges so no cutoff
      const mwW = width * 0.30;
      ctx.save();
      ctx.translate(mwCx, mwCy);
      ctx.rotate(mwAngle);
      // Outer soft band (cross-axis fade only, no along-axis fade → no cutoff)
      const mwBand = ctx.createLinearGradient(0, -mwW/2, 0, mwW/2);
      mwBand.addColorStop(0,    'transparent');
      mwBand.addColorStop(0.22, 'rgba(130,150,215,0.032)');
      mwBand.addColorStop(0.5,  'rgba(165,178,230,0.055)');
      mwBand.addColorStop(0.78, 'rgba(130,150,215,0.032)');
      mwBand.addColorStop(1,    'transparent');
      ctx.fillStyle = mwBand;
      ctx.fillRect(-mwLen/2, -mwW/2, mwLen, mwW);
      // Inner bright core strip
      const mwCore = ctx.createLinearGradient(0, -mwW*0.16, 0, mwW*0.16);
      mwCore.addColorStop(0,   'transparent');
      mwCore.addColorStop(0.5, 'rgba(200,212,245,0.038)');
      mwCore.addColorStop(1,   'transparent');
      ctx.fillStyle = mwCore;
      ctx.fillRect(-mwLen/2, -mwW*0.16, mwLen, mwW*0.32);
      ctx.restore();

      // Dense star cluster along milky way (tiny bright specks)
      ctx.save();
      for(let i = 0; i < 180; i++) {
        const px = (i / 180);
        // Position along the band with scatter
        const bx = (px - 0.5) * mwLen + mwCx + Math.cos(mwAngle) * (Math.random()-0.5)*20;
        const by = mwCy + Math.sin(mwAngle) * (px-0.5)*mwLen*0.3 + (Math.random()-0.5)*mwW*0.6;
        const br = 0.3 + Math.random()*0.7;
        const bo = 0.2 + Math.random()*0.35;
        ctx.beginPath();
        ctx.arc(bx, by, br, 0, Math.PI*2);
        ctx.fillStyle = `rgba(210,218,240,${bo})`;
        ctx.fill();
      }
      ctx.restore();

      // Nebula color blobs
      const nebPos = [[0.2,0.10],[0.78,0.06],[0.5,0.30],[0.15,0.52],[0.87,0.44]];
      const nebColors = ['rgba(74,111,165,0.05)','rgba(126,92,158,0.045)','rgba(201,168,76,0.022)','rgba(74,111,165,0.04)','rgba(126,92,158,0.05)'];
      nebPos.forEach(([nx,ny],i) => {
        const ng = ctx.createRadialGradient(nx*width, ny*height, 0, nx*width, ny*height, width*0.28);
        ng.addColorStop(0, nebColors[i]); ng.addColorStop(1, 'transparent');
        ctx.fillStyle = ng; ctx.fillRect(0,0,width,height);
      });

      // ── Constellations (more visible) ──
      t += 0.016;
      constellations.forEach(({ pts, lines }) => {
        // Draw lines first
        ctx.strokeStyle = 'rgba(201,168,76,0.22)';
        ctx.lineWidth = 0.85;
        ctx.setLineDash([3, 5]);
        lines.forEach(([a,b]) => {
          ctx.beginPath();
          ctx.moveTo(pts[a][0]*width, pts[a][1]*height);
          ctx.lineTo(pts[b][0]*width, pts[b][1]*height);
          ctx.stroke();
        });
        ctx.setLineDash([]);
        // Draw star dots
        pts.forEach(([px,py]) => {
          // Glow
          const gd = ctx.createRadialGradient(px*width, py*height, 0, px*width, py*height, 5);
          gd.addColorStop(0, 'rgba(232,204,133,0.45)');
          gd.addColorStop(1, 'transparent');
          ctx.fillStyle = gd; ctx.fillRect(px*width-5, py*height-5, 10, 10);
          // Core dot
          ctx.beginPath(); ctx.arc(px*width, py*height, 1.6, 0, Math.PI*2);
          ctx.fillStyle = 'rgba(232,204,133,0.85)'; ctx.fill();
        });
      });

      // ── Stars ──
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


      // ── Fiery Meteors ──
      const now = Date.now();
      if(now >= nextMeteorTime) {
        spawnMeteor();
        nextMeteorTime = now + 3000 + Math.random()*5000;
      }
      for(let i = meteors.length-1; i >= 0; i--) {
        const m = meteors[i];
        m.x += m.vx; m.y += m.vy;
        m.life -= m.decay;
        m.firePhase += 0.3;
        if(m.life <= 0 || m.y > height*0.4) { meteors.splice(i,1); continue; }

        const tx = m.x - Math.cos(Math.atan2(m.vy,m.vx))*m.length;
        const ty = m.y - Math.sin(Math.atan2(m.vy,m.vx))*m.length;

        // Tail gradient: white core → amber → orange → deep red → transparent
        const mg = ctx.createLinearGradient(tx, ty, m.x, m.y);
        mg.addColorStop(0,   'transparent');
        mg.addColorStop(0.35,'rgba(180,60,20,'+( m.life*0.18)+')');
        mg.addColorStop(0.6, 'rgba(240,110,30,'+( m.life*0.45)+')');
        mg.addColorStop(0.82,'rgba(255,200,80,'+( m.life*0.75)+')');
        mg.addColorStop(1,   'rgba(255,255,240,'+( m.life*0.95)+')');

        ctx.strokeStyle = mg;
        ctx.lineWidth = m.size * m.life;
        ctx.lineCap = 'round';
        ctx.beginPath(); ctx.moveTo(tx, ty); ctx.lineTo(m.x, m.y); ctx.stroke();

        // Bright leading head glow
        const hg = ctx.createRadialGradient(m.x, m.y, 0, m.x, m.y, m.size*5*m.life);
        hg.addColorStop(0,   `rgba(255,240,200,${m.life*0.9})`);
        hg.addColorStop(0.3, `rgba(255,160,60,${m.life*0.5})`);
        hg.addColorStop(0.7, `rgba(200,80,20,${m.life*0.2})`);
        hg.addColorStop(1,   'transparent');
        ctx.fillStyle = hg;
        ctx.beginPath(); ctx.arc(m.x, m.y, m.size*5*m.life, 0, Math.PI*2); ctx.fill();

        // Tiny flickering sparks near head
        for(let sp=0; sp<3; sp++) {
          const sa = Math.atan2(m.vy,m.vx) + (Math.random()-0.5)*1.2;
          const sd = 3 + Math.random()*8;
          const sx2 = m.x + Math.cos(sa)*sd;
          const sy2 = m.y + Math.sin(sa)*sd;
          ctx.beginPath(); ctx.arc(sx2, sy2, 0.6+Math.random()*0.8, 0, Math.PI*2);
          ctx.fillStyle = `rgba(255,${140+Math.floor(Math.random()*80)},40,${m.life*(0.3+Math.random()*0.4)})`;
          ctx.fill();
        }
      }
      
      requestAnimationFrame(draw);
    };

    draw();
  }

  document.querySelectorAll('.js-open-sign[data-sign-slug]').forEach((element) => {
    element.addEventListener('click', () => {
      safeStorage.set('cosmicLifePath.selectedSign', element.dataset.signSlug || '');
    });
  });

  const birthForm = document.getElementById('birthForm');
  if (birthForm) {
    const monthSelect = document.getElementById('birthMonth');
    const daySelect = document.getElementById('birthDay');
    const yearSelect = document.getElementById('birthYear');
    const dayHelp = document.getElementById('birthDayHelp');
    const signInput = birthForm.querySelector('input[name="sign"]');
    const monthRules = window.COSMIC_FORM_RULE || {};
    const savedState = window.COSMIC_FORM_STATE || {};
    const storedBirthDataRaw = safeStorage.get('cosmicLifePath.birthdate');
    let storedBirthData = null;

    try {
      storedBirthData = storedBirthDataRaw ? JSON.parse(storedBirthDataRaw) : null;
    } catch (error) {
      storedBirthData = null;
    }

    const preferredState = {
      month: savedState.month || (storedBirthData?.sign === signInput?.value ? storedBirthData.month : ''),
      day: savedState.day || (storedBirthData?.sign === signInput?.value ? storedBirthData.day : ''),
      year: savedState.year || (storedBirthData?.sign === signInput?.value ? storedBirthData.year : ''),
    };
    const monthNames = {
      1: 'January',
      2: 'February',
      3: 'March',
      4: 'April',
      5: 'May',
      6: 'June',
      7: 'July',
      8: 'August',
      9: 'September',
      10: 'October',
      11: 'November',
      12: 'December',
    };

    const setHelp = (message = '') => {
      if (!dayHelp) {
        return;
      }

      dayHelp.textContent = message;
      dayHelp.classList.toggle('is-visible', Boolean(message));
      daySelect.classList.toggle('is-invalid', Boolean(message));
    };

    const resetDays = () => {
      daySelect.innerHTML = '<option value="">Day</option>';
      daySelect.disabled = !monthSelect.value;
    };

    Object.keys(monthRules)
      .sort((a, b) => Number(a) - Number(b))
      .forEach((month) => {
        const option = document.createElement('option');
        option.value = month;
        option.textContent = monthNames[month];
        monthSelect.appendChild(option);
      });

    for (let year = 2008; year >= 1900; year -= 1) {
      const option = document.createElement('option');
      option.value = String(year);
      option.textContent = String(year);
      yearSelect.appendChild(option);
    }

    const populateDays = (selectedDay = '') => {
      resetDays();

      if (!monthSelect.value) {
        return;
      }

      const days = monthRules[monthSelect.value] || [];
      days.forEach((day) => {
        const option = document.createElement('option');
        option.value = String(day);
        option.textContent = String(day);
        daySelect.appendChild(option);
      });

      daySelect.disabled = false;

      if (selectedDay && Array.from(daySelect.options).some((option) => option.value === selectedDay)) {
        daySelect.value = selectedDay;
      }
    };

    const warnIfMonthMissing = (event) => {
      if (!monthSelect.value) {
        setHelp('Please select your birth month first.');
        if (event) {
          event.preventDefault();
        }
      } else {
        setHelp('');
      }
    };

    monthSelect.addEventListener('change', () => {
      setHelp('');
      populateDays();
    });

    daySelect.addEventListener('mousedown', warnIfMonthMissing);
    daySelect.addEventListener('focus', warnIfMonthMissing);
    daySelect.addEventListener('change', () => setHelp(''));

    birthForm.addEventListener('submit', (event) => {
      if (!monthSelect.value) {
        setHelp('Please select your birth month first.');
        event.preventDefault();
        daySelect.focus();
        return;
      }

      safeStorage.set('cosmicLifePath.birthdate', JSON.stringify({
        sign: signInput?.value || '',
        month: monthSelect.value,
        day: daySelect.value,
        year: yearSelect.value,
      }));
    });

    if (preferredState.month) {
      monthSelect.value = String(preferredState.month);
    }

    if (preferredState.year) {
      yearSelect.value = String(preferredState.year);
    }

    populateDays(preferredState.day ? String(preferredState.day) : '');
  }

  const birthDetailsForm = document.getElementById('birthDetailsForm');
  if (birthDetailsForm) {
    const signInput = birthDetailsForm.querySelector('input[name="sign"]');
    const hourSelect = document.getElementById('birthHour');
    const minuteSelect = document.getElementById('birthMinute');
    const meridiemSelect = document.getElementById('birthMeridiem');
    const placeInput = document.getElementById('birthPlace');
    const timeUnknown = document.getElementById('timeUnknown');
    const placeUnknown = document.getElementById('placeUnknown');
    const pageError = document.getElementById('birthPlacePageError');
    const state = window.COSMIC_BIRTH_DETAILS_STATE || {};
    const storedDetailsRaw = safeStorage.get('cosmicLifePath.birthDetails');
    let storedDetails = null;

    try {
      storedDetails = storedDetailsRaw ? JSON.parse(storedDetailsRaw) : null;
    } catch (error) {
      storedDetails = null;
    }

    const preferredState = {
      hour: state.hour || (storedDetails?.sign === signInput?.value ? storedDetails.hour : '12') || '12',
      minute: state.minute || (storedDetails?.sign === signInput?.value ? storedDetails.minute : '00') || '00',
      meridiem: state.meridiem || (storedDetails?.sign === signInput?.value ? storedDetails.meridiem : 'AM') || 'AM',
      birthPlace: state.birthPlace || (storedDetails?.sign === signInput?.value ? storedDetails.birthPlace : '') || '',
      timeUnknown: Boolean(state.timeUnknown || (storedDetails?.sign === signInput?.value ? storedDetails.timeUnknown : false)),
      placeUnknown: Boolean(state.placeUnknown || (storedDetails?.sign === signInput?.value ? storedDetails.placeUnknown : false)),
    };

    const setPageError = (message = '') => {
      if (!pageError) {
        return;
      }

      pageError.textContent = message;
      pageError.classList.toggle('is-visible', Boolean(message));
    };

    if (hourSelect.options.length === 0) {
      for (let hour = 1; hour <= 12; hour += 1) {
        const option = document.createElement('option');
        option.value = String(hour);
        option.textContent = String(hour).padStart(2, '0');
        hourSelect.appendChild(option);
      }
    }

    if (minuteSelect.options.length === 0) {
      for (let minute = 0; minute <= 59; minute += 1) {
        const option = document.createElement('option');
        option.value = String(minute).padStart(2, '0');
        option.textContent = String(minute).padStart(2, '0');
        minuteSelect.appendChild(option);
      }
    }

    hourSelect.value = String(preferredState.hour);
    minuteSelect.value = String(preferredState.minute).padStart(2, '0');
    meridiemSelect.value = preferredState.meridiem;
    placeInput.value = preferredState.birthPlace;
    timeUnknown.checked = preferredState.timeUnknown;
    placeUnknown.checked = preferredState.placeUnknown;

    const toggleTimeControls = () => {
      const disabled = timeUnknown.checked;
      hourSelect.disabled = disabled;
      minuteSelect.disabled = disabled;
      meridiemSelect.disabled = disabled;
    };

    const togglePlaceControls = () => {
      const disabled = placeUnknown.checked;
      placeInput.disabled = disabled;
      if (disabled) {
        placeInput.classList.remove('is-invalid');
        setPageError('');
      }
    };

    const storeDraft = () => {
      safeStorage.set('cosmicLifePath.birthDetails', JSON.stringify({
        sign: signInput?.value || '',
        hour: hourSelect.value || '12',
        minute: minuteSelect.value || '00',
        meridiem: meridiemSelect.value || 'AM',
        birthPlace: placeInput.value || '',
        timeUnknown: timeUnknown.checked,
        placeUnknown: placeUnknown.checked,
      }));
    };

    const initGooglePlaces = () => {
      if (!placeInput || !(window.google && window.google.maps && window.google.maps.places)) {
        return;
      }

      if (placeInput.dataset.googleReady === 'true') {
        return;
      }

      const autocomplete = new window.google.maps.places.Autocomplete(placeInput, {
        types: ['(regions)'],
        fields: ['formatted_address', 'name'],
      });

      autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();
        placeInput.value = place.formatted_address || place.name || placeInput.value;
        placeInput.classList.remove('is-invalid');
        setPageError('');
        storeDraft();
      });

      placeInput.dataset.googleReady = 'true';
    };

    timeUnknown.addEventListener('change', () => {
      toggleTimeControls();
      storeDraft();
    });

    placeUnknown.addEventListener('change', () => {
      togglePlaceControls();
      storeDraft();
    });

    [hourSelect, minuteSelect, meridiemSelect, placeInput].forEach((element) => {
      element.addEventListener('change', () => {
        placeInput.classList.remove('is-invalid');
        setPageError('');
        storeDraft();
      });
    });

    birthDetailsForm.addEventListener('submit', (event) => {
      if (!timeUnknown.checked) {
        if (!hourSelect.value) {
          hourSelect.value = '12';
        }
        if (!minuteSelect.value) {
          minuteSelect.value = '00';
        }
        if (!meridiemSelect.value) {
          meridiemSelect.value = 'AM';
        }
      }

      if (!placeUnknown.checked && !placeInput.value.trim()) {
        placeInput.classList.add('is-invalid');
        setPageError('Please enter your place of birth.');
        event.preventDefault();
        placeInput.focus();
        return;
      }

      storeDraft();
    });

    toggleTimeControls();
    togglePlaceControls();
    initGooglePlaces();
    window.addEventListener('cosmicGoogleReady', initGooglePlaces);
  }

  const contactDetailsForm = document.getElementById('contactDetailsForm');
  if (contactDetailsForm) {
    const nameInput = document.getElementById('contactName');
    const emailInput = document.getElementById('contactEmail');
    const storedContactRaw = safeStorage.get('cosmicLifePath.contact');
    let storedContact = null;

    try {
      storedContact = storedContactRaw ? JSON.parse(storedContactRaw) : null;
    } catch (error) {
      storedContact = null;
    }

    if (storedContact) {
      if (!nameInput.value && storedContact.name) {
        nameInput.value = storedContact.name;
      }
      if (!emailInput.value && storedContact.email) {
        emailInput.value = storedContact.email;
      }
    }

    const storeContactDraft = () => {
      safeStorage.set('cosmicLifePath.contact', JSON.stringify({
        name: nameInput.value || '',
        email: emailInput.value || '',
      }));
    };

    nameInput.addEventListener('input', storeContactDraft);
    emailInput.addEventListener('input', storeContactDraft);
    contactDetailsForm.addEventListener('submit', storeContactDraft);
  }
})();
