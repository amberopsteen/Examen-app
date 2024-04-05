describe('Deletion of a user by administrator', () => {
    it('Administrator deletes user', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('admin@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/users');

        // because Cypress doesn't handle JavaScript alerts and confirmation dialogs, the test is written like this to make it look like I clicked Ok
        cy.on('window:confirm', () => true);
        cy.get('tr').not(':contains("user@example.com"), :contains("admin@example.com")').then($rows => {
            const randomIndex = Math.floor(Math.random() * $rows.length);
            const randomUserRow = $rows[randomIndex];
            cy.wrap(randomUserRow).contains('button', 'Delete').click();
        });
    });
    it('Administrator deletes user but enters cancel', () => {
        cy.visit('http://127.0.0.1:8000/');
        cy.get('input[type="email"]').type('admin@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/users');

        // because Cypress doesn't handle JavaScript alerts and confirmation dialogs, the test is written like this to make it look like I clicked cancel
        cy.window().then(win => {
            cy.stub(win, 'confirm').returns(false);
        });
        cy.get('tr').not(':contains("user@example.com"), :contains("admin@example.com")').then($rows => {
            const randomIndex = Math.floor(Math.random() * $rows.length);
            const randomUserRow = $rows[randomIndex];
            cy.wrap(randomUserRow).contains('button', 'Delete').click();
        });
    });
});
