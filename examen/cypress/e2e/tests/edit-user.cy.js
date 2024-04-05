describe('Editing of a new user by administrator', () => {
    it('Administrator edits user', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('admin@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/users');
        cy.get('tr').not(':contains("user@example.com"), :contains("admin@example.com")').then($rows => {
            const randomIndex = Math.floor(Math.random() * $rows.length);
            const randomUserRow = $rows[randomIndex];
            cy.wrap(randomUserRow).find('a[href*="edit"]').click();
        });

        cy.url().should('include', '/edit');
        cy.get('input[name="name"]').clear().type('Wilmers Doe');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
    });

    it('Administrator edits user with invaid information', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('admin@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/users');
        cy.get('tr').not(':contains("user@example.com"), :contains("admin@example.com")').then($rows => {
            const randomIndex = Math.floor(Math.random() * $rows.length);
            const randomUserRow = $rows[randomIndex];
            cy.wrap(randomUserRow).find('a[href*="edit"]').click();
        });

        cy.url().should('include', '/edit');
        cy.get('input[type="email"]').clear().type('kernser.nl');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
    });
})
