
        // Add smooth scrolling and hover effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all info cards
            document.querySelectorAll('.info-card, .image-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });

            // Add parallax effect to floating circles
            document.addEventListener('mousemove', function(e) {
                const circles = document.querySelectorAll('.floating-circle');
                const x = e.clientX / window.innerWidth;
                const y = e.clientY / window.innerHeight;

                circles.forEach((circle, index) => {
                    const speed = (index + 1) * 0.5;
                    const xPos = (x - 0.5) * speed * 50;
                    const yPos = (y - 0.5) * speed * 50;
                    circle.style.transform = `translate(${xPos}px, ${yPos}px)`;
                });
            });
        });