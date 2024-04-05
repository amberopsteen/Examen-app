describe('User is trying to access administrator dashboard', () => {
    it('User tries to go to /users in URL', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.visit('http://127.0.0.1:8000/users')
    })
    it('User tries to go to /users/create in URL', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.visit('http://127.0.0.1:8000/users/create')
    })
    it('User tries to go to /users/edit in URL', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.visit('http://127.0.0.1:8000/users/edit')
    })
    it('User tries to go to /users/show in URL', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.visit('http://127.0.0.1:8000/users/show')
    })
})
