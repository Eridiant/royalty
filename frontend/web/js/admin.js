window.addEventListener('load', () => {
    document.addEventListener('click', (e) => {
        let target = e.target;
        
        if (target.closest('.translate')) {
            console.log(target);
            document.querySelector('.admin-form').classList.add('show');
            document.querySelector('.admin-source-text').innerHTML = target.closest('.translate').dataset.translate;
            document.querySelector('.translation').innerHTML = target.closest('.translate').innerHTML;
        }
        if (target.closest('.aside')) {
            closeMenu();
        }
    })
})