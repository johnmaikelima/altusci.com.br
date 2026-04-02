    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-header__title">Entre em Contato</h1>
            <p class="page-header__description">Estamos prontos para atender você</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact section">
        <div class="container">
            <div class="contact__grid">
                <!-- Contact Info -->
                <div class="contact__info">
                    <h2 class="contact__title">Fale Conosco</h2>
                    <p class="contact__description">
                        Entre em contato conosco através de um dos canais abaixo ou preencha o formulário. Retornaremos o mais breve possível.
                    </p>

                    <div class="contact__items">
                        <div class="contact__item">
                            <div class="contact__item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div class="contact__item-content">
                                <h3 class="contact__item-title">Endereço</h3>
                                <p class="contact__item-text">Estrada dos Vados, 551<br>Guarulhos, SP</p>
                            </div>
                        </div>

                        <div class="contact__item">
                            <div class="contact__item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div class="contact__item-content">
                                <h3 class="contact__item-title">Email</h3>
                                <p class="contact__item-text">
                                    <a href="mailto:contato@altusci.com.br">contato@altusci.com.br</a>
                                </p>
                            </div>
                        </div>

                        <div class="contact__item">
                            <div class="contact__item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                            </div>
                            <div class="contact__item-content">
                                <h3 class="contact__item-title">WhatsApp</h3>
                                <p class="contact__item-text">
                                    <a href="https://wa.me/5511987756034" target="_blank">(11) 98775-6034</a>
                                </p>
                            </div>
                        </div>

                        <div class="contact__item">
                            <div class="contact__item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div class="contact__item-content">
                                <h3 class="contact__item-title">Horário de Atendimento</h3>
                                <p class="contact__item-text">Segunda a Sexta: 8h às 18h<br>Sábado: 9h às 13h</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact__form-wrapper">
                    <form class="contact__form" id="contact-form">
                        <div class="form__group">
                            <label for="name" class="form__label">Nome Completo</label>
                            <input type="text" id="name" name="name" class="form__input" required>
                        </div>

                        <div class="form__group">
                            <label for="email" class="form__label">Email</label>
                            <input type="email" id="email" name="email" class="form__input" required>
                        </div>

                        <div class="form__group">
                            <label for="phone" class="form__label">Telefone</label>
                            <input type="tel" id="phone" name="phone" class="form__input" required>
                        </div>

                        <div class="form__group">
                            <label for="service" class="form__label">Serviço de Interesse</label>
                            <select id="service" name="service" class="form__input">
                                <option value="">Selecione um serviço</option>
                                <option value="notebook">Manutenção de Notebook</option>
                                <option value="computador">Manutenção de Computador</option>
                                <option value="suporte">Suporte de TI</option>
                                <option value="software">Instalação de Software</option>
                                <option value="consultoria">Consultoria</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>

                        <div class="form__group">
                            <label for="message" class="form__label">Mensagem</label>
                            <textarea id="message" name="message" class="form__input form__textarea" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="button button--primary button--full">
                            Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map section section--no-padding">
        <div class="map__container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.5!2d-46.5!3d-23.45!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDI3JzAwLjAiUyA0NsKwMzAnMDAuMCJX!5e0!3m2!1spt-BR!2sbr!4v1234567890"
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
