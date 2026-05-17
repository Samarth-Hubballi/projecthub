// extracted from index.php jQuery script and intersection observer
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        // Add visibility class when in view, remove when out of view for fade-in / fade-out.
        entry.target.classList.toggle('is-visible', entry.isIntersecting);
    });
}, observerOptions);

// Initialize animations immediately and on DOM ready
function initializeAnimations() {
    document.querySelectorAll('.animate-on-scroll').forEach((el) => {
        observer.observe(el);
    });
}

// Run on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeAnimations);
} else {
    initializeAnimations();
}

$(document).ready(function(){

    $("#t1").keyup(function(){
        if($("#t1").val() == ""){
            return;
        }
        $.get(
            "getresult.php",
            { data: $("#t1").val() },
            function(data){
                $("#result").html(data);
            }
        );
    });
});
