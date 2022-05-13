window.addEventListener('load', () => {
    let form = document.querySelector('.admin-form');
    document.addEventListener('click', (e) => {
        let target = e.target;
        
        if (target.closest('.translate')) {
            form.classList.add('active');
            document.querySelector('.admin-source-text').innerHTML = target.closest('.translate').dataset.translate;
            document.querySelector('.form .translation').value = target.innerHTML;
            target.closest('.translate').classList.add('current-translation');
        } else if (!target.closest('.admin-form')) {
            form.classList.remove('active');
        }
        if (target.closest('.admin-source-text')) {
            let text = document.createElement("textarea");
            document.body.appendChild(text);
            text.value = document.querySelector('.admin-source-text').innerHTML;
            text.select();
            document.execCommand("copy");
            text.remove();
            // console.log(text);
            // document.querySelector('.admin-source-text').select();    
            // document.execCommand("copy");
        }
    });

    document.forms.trslt.onsubmit = function(e) {
        e.preventDefault();
        document.querySelector('.current-translation').innerHTML = this.translate.value;
        document.querySelectorAll('.current-translation').forEach(el => el.classList.remove('current-translation'))
        form.classList.remove('active');
        trsltAjax(document.querySelector('.admin-source-text').innerHTML, this.translate.value)
            .then(response => document.querySelector('.translation').innerHTML = '')
            .catch(error => console.error('error'));
    }
})
function trsltAjax(key, translation) {
    return new Promise((succeed, fail) => {
        // console.log(wrap.dataset.id);
        let quizRequest = new XMLHttpRequest();
        quizRequest.open("POST", '/translation/translation-ajax', true);
        quizRequest.setRequestHeader('Content-Type', 'application/json');
        // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        quizRequest.setRequestHeader('X-CSRF-Token', document.querySelector('meta[name="csrf-token"]').content);
        quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        quizRequest.onload = function() {
            if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                succeed(quizRequest.responseText);
            } else if (quizRequest.status == 400) {
                // throw Error('Ошибка: ' + quizRequest.status);
                fail(new Error(`Request failed: ${quizRequest.status}`));
            } else {
                // throw Error('Ошибка, что-то пошло не так.');
                fail(new Error('Ошибка, что-то пошло не так.'));
            }
        }
        quizRequest.onerror = function() {console.log(onerror)};
        // let data = { survey_id: quiz.dataset.id };
        let data = { 'key':key, 'translation':translation };

        // quizRequest.send('survey_id=2&parent_id=0');
        quizRequest.send(JSON.stringify(data));
        // quizRequest.send(encodeURI(data));
        // quizRequest.send(data);
        // quizRequest.send();
    })
    
}