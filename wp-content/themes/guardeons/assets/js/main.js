(function(){
  // Mobile menu toggle
  var toggle = document.querySelector('.nav-toggle');
  var menu = document.querySelector('.nav-menu');
  if (toggle && menu) {
    toggle.addEventListener('click', function(){
      var isOpen = menu.classList.toggle('active');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  }

  // Reveal on scroll + counters
  var observer = ('IntersectionObserver' in window) ? new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        if (entry.target.classList.contains('metric')) {
          var c = entry.target.querySelector('.counter');
          if (c && !c.dataset.counted) {
            c.dataset.counted = '1';
            var target = parseFloat(c.dataset.target);
            var start = 0;
            var duration = 1200;
            var startTs;
            var isFloat = String(target).indexOf('.') > -1;
            function animate(ts){
              if (!startTs) startTs = ts;
              var p = Math.min((ts - startTs) / duration, 1);
              var val = start + (target - start) * p;
              c.textContent = isFloat ? val.toFixed(1) : Math.round(val);
              if (p < 1) requestAnimationFrame(animate);
            }
            requestAnimationFrame(animate);
          }
        }
        observer.unobserve(entry.target);
      }
    });
  }, {threshold: 0.2}) : null;

  if (observer) {
    document.querySelectorAll('.reveal').forEach(function(el){ observer.observe(el); });
  }

  // Service details expand/collapse
  document.addEventListener('click', function(e){
    var btn = e.target.closest('.service-toggle');
    if (!btn) return;
    var details = btn.closest('.service-card').querySelector('.service-details');
    if (!details) return;
    var expanded = btn.getAttribute('aria-expanded') === 'true';
    btn.setAttribute('aria-expanded', expanded ? 'false' : 'true');
    if (expanded) {
      details.hidden = true;
    } else {
      details.hidden = false;
    }
    e.preventDefault();
  });

  // Simple particles background for hero
  var canvas = document.querySelector('#hero-particles');
  if (canvas && canvas.getContext) {
    var ctx = canvas.getContext('2d');
    var width, height, particles = [];
    function resize(){
      width = canvas.width = canvas.offsetWidth;
      height = canvas.height = canvas.offsetHeight;
    }
    window.addEventListener('resize', resize);
    resize();

    for (var i=0;i<60;i++) {
      particles.push({
        x: Math.random()*width,
        y: Math.random()*height,
        vx: (Math.random()-.5)*.4,
        vy: (Math.random()-.5)*.4,
        r: Math.random()*2+0.5
      });
    }

    function step(){
      ctx.clearRect(0,0,width,height);
      ctx.fillStyle = 'rgba(16,185,129,0.6)';
      particles.forEach(function(p){
        p.x += p.vx; p.y += p.vy;
        if (p.x<0||p.x>width) p.vx*=-1;
        if (p.y<0||p.y>height) p.vy*=-1;
        ctx.beginPath();
        ctx.arc(p.x,p.y,p.r,0,Math.PI*2);
        ctx.fill();
      });
      requestAnimationFrame(step);
    }
    step();
  }
})();
