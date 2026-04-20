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
      // ctx.save();
      // for(let i = 0; i < 180; i++) {
      //   const px = (i / 180);
      //   // Position along the band with scatter
      //   const bx = (px - 0.5) * mwLen + mwCx + Math.cos(mwAngle) * (Math.random()-0.5)*20;
      //   const by = mwCy + Math.sin(mwAngle) * (px-0.5)*mwLen*0.3 + (Math.random()-0.5)*mwW*0.6;
      //   const br = 0.3 + Math.random()*0.7;
      //   const bo = 0.2 + Math.random()*0.35;
      //   ctx.beginPath();
      //   ctx.arc(bx, by, br, 0, Math.PI*2);
      //   ctx.fillStyle = `rgba(210,218,240,${bo})`;
      //   ctx.fill();
      // }
      // ctx.restore();

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
    const stageDate = document.getElementById('birthStageDate');
    const stageDetails = document.getElementById('birthStageDetails');
    const stageNextButton = document.getElementById('birthStageNext');
    const stage2BirthDateDisplay = document.getElementById('stage2BirthDateDisplay');
    const hiddenBirthMonth = document.getElementById('hiddenBirthMonth');
    const hiddenBirthDay = document.getElementById('hiddenBirthDay');
    const hiddenBirthYear = document.getElementById('hiddenBirthYear');
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

    const formatBirthDate = (month, day, year) => {
      if (!month || !day || !year) {
        return 'Not selected';
      }

      return `${String(month).padStart(2, '0')} / ${String(day).padStart(2, '0')} / ${String(year).padStart(4, '0')}`;
    };

    const syncBirthDateToDetailsForm = () => {
      if (hiddenBirthMonth) {
        hiddenBirthMonth.value = monthSelect.value || '';
      }

      if (hiddenBirthDay) {
        hiddenBirthDay.value = daySelect.value || '';
      }

      if (hiddenBirthYear) {
        hiddenBirthYear.value = yearSelect.value || '';
      }

      if (stage2BirthDateDisplay) {
        stage2BirthDateDisplay.textContent = formatBirthDate(monthSelect.value, daySelect.value, yearSelect.value);
      }
    };

    const activateDetailsStage = (animated = true) => {
      if (!stageDate || !stageDetails) {
        return;
      }

      syncBirthDateToDetailsForm();

      if (!animated) {
        stageDate.classList.add('d-none');
        stageDate.classList.remove('is-active', 'is-exit');
        stageDetails.classList.remove('d-none', 'is-exit');
        stageDetails.classList.add('is-active');
        return;
      }

      stageDate.classList.add('is-exit');
      stageDate.classList.remove('is-active');

      window.setTimeout(() => {
        stageDate.classList.add('d-none');
        stageDate.classList.remove('is-exit');
        stageDetails.classList.remove('d-none', 'is-exit');

        window.requestAnimationFrame(() => {
          stageDetails.classList.add('is-active');
        });
      }, 460);
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
      // daySelect.classList.toggle('is-invalid', Boolean(message));
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
      syncBirthDateToDetailsForm();
    });

    daySelect.addEventListener('mousedown', warnIfMonthMissing);
    daySelect.addEventListener('focus', warnIfMonthMissing);
    daySelect.addEventListener('change', () => {
      setHelp('');
      syncBirthDateToDetailsForm();
    });

    yearSelect.addEventListener('change', () => {
      syncBirthDateToDetailsForm();
    });

    birthForm.addEventListener('submit', (event) => {
      event.preventDefault();
    });

    if (stageNextButton) {
      stageNextButton.addEventListener('click', () => {
        // Remove all error classes first
        monthSelect.classList.remove('is-invalid');
        daySelect.classList.remove('is-invalid');
        yearSelect.classList.remove('is-invalid');
        setHelp('');

        // Priority: Month > Day > Year
        if (!monthSelect.value) {
          monthSelect.classList.add('is-invalid');
          setHelp('Please select your birth month.');
          monthSelect.focus();
          return;
        }

        if (!daySelect.value) {
          daySelect.classList.add('is-invalid');
          setHelp('Please select your birth day.');
          daySelect.focus();
          return;
        }

        if (!yearSelect.value) {
          yearSelect.classList.add('is-invalid');
          setHelp('Please select your birth year.');
          yearSelect.focus();
          return;
        }

        // All valid, remove errors
        monthSelect.classList.remove('is-invalid');
        daySelect.classList.remove('is-invalid');
        yearSelect.classList.remove('is-invalid');
        setHelp('');

        safeStorage.set('cosmicLifePath.birthdate', JSON.stringify({
          sign: signInput?.value || '',
          month: monthSelect.value,
          day: daySelect.value,
          year: yearSelect.value,
        }));

        activateDetailsStage(true);
      });
    }

    if (preferredState.month) {
      monthSelect.value = String(preferredState.month);
    }

    if (preferredState.year) {
      yearSelect.value = String(preferredState.year);
    }

    populateDays(preferredState.day ? String(preferredState.day) : '');
    syncBirthDateToDetailsForm();

    if (savedState.stage === 'details') {
      activateDetailsStage(false);
    }
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

  const SOCIAL_PROOF_ITEMS = [
    { name: 'Barbara K.', country: 'Georgia', action: 'just started their free reading', minutesAgo: 3 },
    { name: 'Ava M.', country: 'Texas', action: 'just started their free reading', minutesAgo: 2 },
    { name: 'Daniel H.', country: 'Florida', action: 'just started their free reading', minutesAgo: 5 },
    { name: 'Sofia L.', country: 'California', action: 'just started their free reading', minutesAgo: 4 },
    { name: 'Lucas B.', country: 'Ontario', action: 'just started their free reading', minutesAgo: 7 },
    { name: 'Mina P.', country: 'Seoul', action: 'just started their free reading', minutesAgo: 1 },
    { name: 'Emma R.', country: 'New York', action: 'just started their free reading', minutesAgo: 8 },
    { name: 'Noah S.', country: 'Arizona', action: 'just started their free reading', minutesAgo: 6 },
    { name: 'Chloe T.', country: 'Melbourne', action: 'just started their free reading', minutesAgo: 9 },
    { name: 'Liam C.', country: 'Dublin', action: 'just started their free reading', minutesAgo: 5 },
    { name: 'Grace W.', country: 'Colorado', action: 'just started their free reading', minutesAgo: 11 },
    { name: 'Hana J.', country: 'Busan', action: 'just started their free reading', minutesAgo: 12 },
    { name: 'Mason D.', country: 'Nevada', action: 'just started their free reading', minutesAgo: 10 },
    { name: 'Aria N.', country: 'London', action: 'just started their free reading', minutesAgo: 4 },
    { name: 'Ethan V.', country: 'Berlin', action: 'just started their free reading', minutesAgo: 14 },
    { name: 'Zoe Q.', country: 'Auckland', action: 'just started their free reading', minutesAgo: 3 },
    { name: 'Olivia Y.', country: 'Vancouver', action: 'just unlocked their reading summary', minutesAgo: 6 },
    { name: 'James G.', country: 'Wisconsin', action: 'just unlocked their reading summary', minutesAgo: 9 },
    { name: 'Ella F.', country: 'Manchester', action: 'just unlocked their reading summary', minutesAgo: 12 },
    { name: 'Henry A.', country: 'Montreal', action: 'just unlocked their reading summary', minutesAgo: 7 },
    { name: 'Yuna K.', country: 'Tokyo', action: 'just unlocked their reading summary', minutesAgo: 15 },
    { name: 'Mila O.', country: 'Perth', action: 'just unlocked their reading summary', minutesAgo: 18 },
    { name: 'Leo Z.', country: 'Chicago', action: 'just unlocked their reading summary', minutesAgo: 11 },
    { name: 'Aiden I.', country: 'Bristol', action: 'just unlocked their reading summary', minutesAgo: 16 },
    { name: 'Nora U.', country: 'Osaka', action: 'just unlocked their reading summary', minutesAgo: 13 },
    { name: 'Mia X.', country: 'Auckland', action: 'just unlocked their reading summary', minutesAgo: 10 },
    { name: 'Charlotte E.', country: 'Tennessee', action: 'just purchased the full cosmic report', minutesAgo: 4 },
    { name: 'Liam P.', country: 'Oregon', action: 'just purchased the full cosmic report', minutesAgo: 8 },
    { name: 'Sophia M.', country: 'Sydney', action: 'just purchased the full cosmic report', minutesAgo: 3 },
    { name: 'Elijah R.', country: 'Utah', action: 'just purchased the full cosmic report', minutesAgo: 6 },
    { name: 'Amelia S.', country: 'Toronto', action: 'just purchased the full cosmic report', minutesAgo: 5 },
    { name: 'Benjamin L.', country: 'Madrid', action: 'just purchased the full cosmic report', minutesAgo: 11 },
    { name: 'Harper D.', country: 'Daejeon', action: 'just purchased the full cosmic report', minutesAgo: 7 },
    { name: 'Logan C.', country: 'Austin', action: 'just purchased the full cosmic report', minutesAgo: 9 },
    { name: 'Isla P.', country: 'Edinburgh', action: 'just purchased the full cosmic report', minutesAgo: 14 },
    { name: 'Jack W.', country: 'Brisbane', action: 'just purchased the full cosmic report', minutesAgo: 6 },
    { name: 'Scarlett H.', country: 'San Diego', action: 'just purchased the full cosmic report', minutesAgo: 12 },
    { name: 'Evelyn B.', country: 'Paris', action: 'just purchased the full cosmic report', minutesAgo: 13 },
    { name: 'Sebastian T.', country: 'Oslo', action: 'just purchased the full cosmic report', minutesAgo: 15 },
    { name: 'Abigail N.', country: 'Cape Town', action: 'just purchased the full cosmic report', minutesAgo: 10 },
  ];

  const socialProofState = {
    initialized: false,
    timer: null,
    popup: null,
    host: null,
    lastIndex: -1,
  };

  function getSocialProofPool(mode) {
    if (mode === 'purchase') {
      return SOCIAL_PROOF_ITEMS.filter((item) => item.action.includes('purchased'));
    }

    if (mode === 'summary') {
      return SOCIAL_PROOF_ITEMS.filter((item) => item.action.includes('unlocked'));
    }

    if (mode === 'quiz') {
      return SOCIAL_PROOF_ITEMS.filter((item) => item.action.includes('started'));
    }

    return SOCIAL_PROOF_ITEMS;
  }

  function pickRandomSocialProof(pool) {
    if (!pool.length) {
      return null;
    }

    if (pool.length === 1) {
      socialProofState.lastIndex = 0;
      return pool[0];
    }

    let index = Math.floor(Math.random() * pool.length);
    while (index === socialProofState.lastIndex) {
      index = Math.floor(Math.random() * pool.length);
    }

    socialProofState.lastIndex = index;
    return pool[index];
  }

  function clearSocialProofTimer() {
    if (socialProofState.timer) {
      window.clearTimeout(socialProofState.timer);
      socialProofState.timer = null;
    }
  }

  function destroySocialProofPopup() {
    if (socialProofState.popup) {
      socialProofState.popup.remove();
      socialProofState.popup = null;
    }
  }

  function minutesAgoLabel(minutesAgo) {
    const value = Math.max(1, Number(minutesAgo) || 1);
    return value === 1 ? '1 min ago' : `${value} mins ago`;
  }

  function createPopupElement(item) {
    const initial = (item.name || '?').trim().charAt(0).toUpperCase() || '?';
    const card = document.createElement('div');
    card.className = 'social-proof-popup';
    card.setAttribute('role', 'status');
    card.setAttribute('aria-live', 'polite');

    card.innerHTML = `
      <div class="social-proof-avatar" aria-hidden="true">${initial}</div>
      <div class="social-proof-content">
        <p class="social-proof-name">${item.name} from ${item.country}</p>
        <p class="social-proof-action">${item.action}</p>
        <p class="social-proof-time">${minutesAgoLabel(item.minutesAgo)}</p>
      </div>
      <button type="button" class="social-proof-close" aria-label="Close notification">&times;</button>
    `;

    const closeButton = card.querySelector('.social-proof-close');
    if (closeButton) {
      closeButton.addEventListener('click', () => {
        card.classList.remove('is-visible');
      });
    }

    return card;
  }

  function showSocialProofCycle(config) {
    const mode = config.mode || 'all';
    const pool = getSocialProofPool(mode);
    const item = pickRandomSocialProof(pool);
    if (!item || !socialProofState.host) {
      return;
    }

    destroySocialProofPopup();

    const popup = createPopupElement(item);
    socialProofState.popup = popup;
    socialProofState.host.appendChild(popup);

    window.requestAnimationFrame(() => {
      popup.classList.add('is-visible');
    });

    const visibleMs = Number(config.visibleMs) > 0 ? Number(config.visibleMs) : 5000;
    const fadeMs = Number(config.fadeMs) > 0 ? Number(config.fadeMs) : 700;
    const minDelayMs = Number(config.minDelayMs) > 0 ? Number(config.minDelayMs) : 5000;
    const maxDelayMs = Number(config.maxDelayMs) > 0 ? Number(config.maxDelayMs) : 30000;
    const nextDelay = Math.floor(Math.random() * Math.max(1, maxDelayMs - minDelayMs + 1)) + minDelayMs;

    socialProofState.timer = window.setTimeout(() => {
      popup.classList.remove('is-visible');

      socialProofState.timer = window.setTimeout(() => {
        if (popup.parentNode) {
          popup.remove();
        }
        showSocialProofCycle(config);
      }, fadeMs + nextDelay);
    }, visibleMs);
  }

  window.initCosmicSocialProof = function initCosmicSocialProof(rawConfig = {}) {
    if (socialProofState.initialized) {
      return;
    }

    const enabled = rawConfig && rawConfig.enabled !== false;
    if (!enabled) {
      return;
    }

    const host = document.createElement('div');
    host.className = 'social-proof-host';
    document.body.appendChild(host);

    socialProofState.host = host;
    socialProofState.initialized = true;

    showSocialProofCycle(rawConfig);

    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        clearSocialProofTimer();
      } else {
        clearSocialProofTimer();
        showSocialProofCycle(rawConfig);
      }
    });
  };

  if (window.COSMIC_SOCIAL_PROOF && window.COSMIC_SOCIAL_PROOF.enabled) {
    window.initCosmicSocialProof(window.COSMIC_SOCIAL_PROOF);
  }
})();
