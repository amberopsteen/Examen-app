describe('Login as user', () => {
    it('User enters valid login credentials', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
    })
    it('User enters invalid login credentials', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('root');
        cy.get('button[type="submit"]').click();
    })
    it('User leaves password field empty', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('button[type="submit"]').click();
    })
})
