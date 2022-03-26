window.addEventListener('load', () => {
    // document.forms.callBack.addEventListener('submit', (e) => {
    //     e.preventDefault();
    //     // console.log($(this).serializeArray());
    //     console.log(e.name);
    //     // console.log(this);
        
    // })


    if (document.querySelector('.apartments-thumbs')) {
        var thumbs = new Swiper(".apartments-thumbs", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
        });
        var apartments = new Swiper(".apartments-slider", {
            loop: true,
            spaceBetween: 20,
            thumbs: {
                swiper: thumbs,
            },
        });

        let tabs = document.querySelector('.apartments-tabs');
        tabs.addEventListener('click', (e) => {
            let target = e.target.closest('li');
            // console.log(target.classList.contains('active'));
            if (!target.classList.contains('active')) {
                document.querySelector('.apartments-tabs .active').classList.remove('active');
                document.querySelector('.apartments-desc .current').classList.remove('current');
                let i = target.dataset.num;
                document.querySelector(`.apartments-tabs [data-num="${i}"]`).classList.add('active');
                document.querySelector(`.apartments-desc [data-num="${i}"]`).classList.add('current');
                apartments.slideTo(`${i * 2 + 1}`);
            }
        })
    }

    if (document.querySelector('.contacts')) {
        
        document.forms.callBack.onsubmit = function(e) {
            e.preventDefault();
            // console.log(this.name.value);
            quizAjax(this.name.value, this.phone.value);
        }
    }

    if (document.querySelector('.popup-wrapper')) {
		document.body.addEventListener('click', (e) => {
			if (e.target.classList.contains('popup-wrapper')) {
				document.querySelectorAll('.popup-wrapper').forEach((e) => {
					e.classList.remove('show');
                    document.querySelector('.popup-inner').innerHTML = '';
				})
			}
		})
	}

    if (document.querySelector('.plans')) {

        let building = document.querySelector('#building').contentDocument;

        building.addEventListener('mouseover', (e) => {

            if (e.target.closest('.area')) {
                document.querySelector('.fl').innerHTML = e.target.dataset.i;
            }
        })

        building.addEventListener('click', (e) => {
            if (e.target.closest('.area')) {
                floorAjax(e.target.dataset.i);
            }
        })
    }

})



function floorAjax(floor) {
    // console.log(wrap.dataset.id);
    let quizRequest = new XMLHttpRequest();
    quizRequest.open("POST", '/site/floor', true);
    quizRequest.setRequestHeader('Content-Type', 'application/json');
    // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    quizRequest.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
    quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    quizRequest.onload = function() {
        if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
            // rend(JSON.parse(quizRequest.responseText));
            // rend(quizRequest.responseText);
            // let ss = JSON.parse(quizRequest.responseText);
            // if (ss.data.success) {
                // console.log(quizRequest.responseText);
                // console.log(ss.data.success);

                document.querySelector('#plans').innerHTML = quizRequest.responseText;
                // document.querySelector('.popup-wrapper .popup-inner').classList.add('sending');
                // }
                if ( document.querySelector('.floor') ) {
                    document.querySelector('.plans-bg').classList.add('dn');
                    document.querySelector('.building').classList.add('dn');
                    setTimeout(flr, 1000);
                }

        } else if (quizRequest.status == 400) {
            throw Error('Ошибка: ' + quizRequest.status);
        } else {
            throw Error('Ошибка, что-то пошло не так.');
        }
    }
    quizRequest.onerror = function() {console.log(onerror)};
    // let data = { survey_id: quiz.dataset.id };
    let data = { 'floor':floor };

    // quizRequest.send('survey_id=2&parent_id=0');
    quizRequest.send(JSON.stringify(data));
    // quizRequest.send(encodeURI(data));
    // quizRequest.send(data);
    // quizRequest.send();
}


function flr() {
    let floor = document.querySelector('#floor').contentDocument;
    let flat = document.querySelector('.flat');
    let flatCont = flat.contentDocument;
    document.querySelector('.floor-btn').addEventListener('click', (e) => {
        document.querySelector('.plans-bg').classList.remove('dn');
        document.querySelector('.building').classList.remove('dn');
        document.querySelector('#plans').innerHTML = '';
    })

    floor.addEventListener('click', (e) => {
        if (e.target.closest('.area')) {
            flatAjax(e.target.dataset.i);
            // document.querySelector('.floor-change').innerHTML = e.target.dataset.i;
            flat.classList.add('show');
        }
    })
    document.querySelector('.flat-btn').addEventListener('click', (e) => {
        flat.classList.remove('show');
    })

    if (document.querySelector('.apartments-thumbs')) {
        var thumbs = new Swiper(".apartments-thumbs", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
        });
        var apartments = new Swiper(".apartments-slider", {
            loop: true,
            spaceBetween: 20,
            thumbs: {
                swiper: thumbs,
            },
        });

        function flatAjax(i) {
            // console.log(wrap.dataset.id);
            let quizRequest = new XMLHttpRequest();
            quizRequest.open("POST", '/site/flat', true);
            quizRequest.setRequestHeader('Content-Type', 'application/json');
            // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            quizRequest.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
            quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            quizRequest.onload = function() {
                if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                    // rend(JSON.parse(quizRequest.responseText));
                    // rend(quizRequest.responseText);
                    // let ss = JSON.parse(quizRequest.responseText);
                    // sliderFlat(ss.data[0]);
                    
                    // if (ss.data.success) {
                        // console.log(quizRequest.responseText);
                        // console.log(ss.data.success);
                        // document.querySelector('.popup-wrapper').classList.add('show');flat
                        // document.querySelector('.apartments-slider-wrapper').innerHTML = quizRequest.responseText;
                        // // document.querySelector('.popup-wrapper .popup-inner').classList.add('sending');
                        // // }
                        // apartments.update();
                        // thumbs.update();
                    
        
                } else if (quizRequest.status == 400) {
                    throw Error('Ошибка: ' + quizRequest.status);
                } else {
                    throw Error('Ошибка, что-то пошло не так.');
                }
            }
            quizRequest.onerror = function() {console.log(onerror)};
            // let data = { survey_id: quiz.dataset.id };
            let data = { 'flat':i };
        
            // quizRequest.send('survey_id=2&parent_id=0');
            quizRequest.send(JSON.stringify(data));
            // quizRequest.send(encodeURI(data));
            // quizRequest.send(data);
            // quizRequest.send();
        }
    }
}

function quizAjax(name, phone) {
    // console.log(wrap.dataset.id);
    let quizRequest = new XMLHttpRequest();
    quizRequest.open("POST", '/site/callback', true);
    quizRequest.setRequestHeader('Content-Type', 'application/json');
    // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    quizRequest.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
    quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    quizRequest.onload = function() {
        if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
            // rend(JSON.parse(quizRequest.responseText));
            // rend(quizRequest.responseText);
            // let ss = JSON.parse(quizRequest.responseText);
            // if (ss.data.success) {
                // console.log(quizRequest.responseText);
                // console.log(ss.data.success);
                document.querySelector('.popup-wrapper').classList.add('show');
                document.querySelector('.popup-wrapper .popup').innerHTML = quizRequest.responseText;
                document.querySelector('.popup-wrapper .popup-inner').classList.add('sending');
                // }
            

        } else if (quizRequest.status == 400) {
            throw Error('Ошибка: ' + quizRequest.status);
        } else {
            throw Error('Ошибка, что-то пошло не так.');
        }
    }
    quizRequest.onerror = function() {console.log(onerror)};
    // let data = { survey_id: quiz.dataset.id };
    let data = { 'name':name, 'phone':phone };

    // quizRequest.send('survey_id=2&parent_id=0');
    quizRequest.send(JSON.stringify(data));
    // quizRequest.send(encodeURI(data));
    // quizRequest.send(data);
    // quizRequest.send();
}

function rend(respond) {
    // let wrap = document.querySelector('.quiz-wrap');
    // wrap.innerHTML = respond;
    console.log(respond);
    
}