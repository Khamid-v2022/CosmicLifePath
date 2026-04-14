(() => {
  const cursor = document.getElementById('cursor');
  const ring = document.getElementById('cursorRing');
  const interactiveEls = document.querySelectorAll('a, button, select, .js-open-sign');
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

    for (let hour = 1; hour <= 12; hour += 1) {
      const option = document.createElement('option');
      option.value = String(hour);
      option.textContent = String(hour).padStart(2, '0');
      hourSelect.appendChild(option);
    }

    for (let minute = 0; minute <= 59; minute += 1) {
      const option = document.createElement('option');
      option.value = String(minute).padStart(2, '0');
      option.textContent = String(minute).padStart(2, '0');
      minuteSelect.appendChild(option);
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
