describe('Creation of a new user by administrator', () => {
    it('Administrator creates new user with valid information', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('admin@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/users');
        cy.contains('Create').click();
        cy.url().should('include', '/create');
        cy.get('input[name="name"]').type('Amber');
        cy.get('input[type="email"]').type('amber@example.com');
        cy.get('input[type="password"]').type('root12345');
        cy.get('#role').select('Admin');
        cy.get('button[type="submit"]').click();
    })
    it('Administrator creates new user with invalid information', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('admin@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/users');
        cy.contains('Create').click();
        cy.url().should('include', '/create');
        cy.get('input[name="name"]').type('Jane');
        cy.get('input[type="email"]').type('jane123');
        cy.get('input[type="password"]').type('root123');
        cy.get('#role').select('Admin');
        cy.get('button[type="submit"]').click();
    })
})
