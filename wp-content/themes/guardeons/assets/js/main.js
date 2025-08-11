(function(){
  // Mobile menu toggle
  var toggle = document.querySelector('.menu-toggle');
  var nav = document.querySelector('.main-navigation');
  if (toggle && nav) {
    toggle.addEventListener('click', function(){
      var isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  }

  // Reveal on scroll
  var observer = ('IntersectionObserver' in window) ? new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        observer.unobserve(entry.target);
      }
    });
  }, {threshold: 0.15}) : null;

  if (observer) {
    document.querySelectorAll('.reveal').forEach(function(el){ observer.observe(el); });
  }

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
      ctx.fillStyle = 'rgba(0,230,118,0.6)';
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
