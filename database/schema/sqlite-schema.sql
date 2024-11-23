CREATE TABLE IF NOT EXISTS "migrations"(
  "id" integer primary key autoincrement not null,
  "migration" varchar not null,
  "batch" integer not null
);
CREATE TABLE IF NOT EXISTS "users"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "email" varchar not null,
  "email_verified_at" datetime,
  "password" varchar not null,
  "remember_token" varchar,
  "current_team_id" integer,
  "profile_photo_path" varchar,
  "trial_is_used" tinyint(1) not null default '0',
  "created_at" datetime,
  "updated_at" datetime,
  "two_factor_secret" text,
  "two_factor_recovery_codes" text,
  "two_factor_confirmed_at" datetime,
  "stripe_id" varchar,
  "pm_type" varchar,
  "pm_last_four" varchar,
  "trial_ends_at" datetime
);
CREATE UNIQUE INDEX "users_email_unique" on "users"("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens"(
  "email" varchar not null,
  "token" varchar not null,
  "created_at" datetime,
  primary key("email")
);
CREATE TABLE IF NOT EXISTS "sessions"(
  "id" varchar not null,
  "user_id" integer,
  "ip_address" varchar,
  "user_agent" text,
  "payload" text not null,
  "last_activity" integer not null,
  primary key("id")
);
CREATE INDEX "sessions_user_id_index" on "sessions"("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions"("last_activity");
CREATE TABLE IF NOT EXISTS "cache"(
  "key" varchar not null,
  "value" text not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks"(
  "key" varchar not null,
  "owner" varchar not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "jobs"(
  "id" integer primary key autoincrement not null,
  "queue" varchar not null,
  "payload" text not null,
  "attempts" integer not null,
  "reserved_at" integer,
  "available_at" integer not null,
  "created_at" integer not null
);
CREATE INDEX "jobs_queue_index" on "jobs"("queue");
CREATE TABLE IF NOT EXISTS "job_batches"(
  "id" varchar not null,
  "name" varchar not null,
  "total_jobs" integer not null,
  "pending_jobs" integer not null,
  "failed_jobs" integer not null,
  "failed_job_ids" text not null,
  "options" text,
  "cancelled_at" integer,
  "created_at" integer not null,
  "finished_at" integer,
  primary key("id")
);
CREATE TABLE IF NOT EXISTS "failed_jobs"(
  "id" integer primary key autoincrement not null,
  "uuid" varchar not null,
  "connection" text not null,
  "queue" text not null,
  "payload" text not null,
  "exception" text not null,
  "failed_at" datetime not null default CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs"("uuid");
CREATE TABLE IF NOT EXISTS "lemon_squeezy_customers"(
  "id" integer primary key autoincrement not null,
  "billable_id" integer not null,
  "billable_type" varchar not null,
  "lemon_squeezy_id" varchar,
  "trial_ends_at" datetime,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "lemon_squeezy_customers_billable_id_billable_type_unique" on "lemon_squeezy_customers"(
  "billable_id",
  "billable_type"
);
CREATE UNIQUE INDEX "lemon_squeezy_customers_lemon_squeezy_id_unique" on "lemon_squeezy_customers"(
  "lemon_squeezy_id"
);
CREATE TABLE IF NOT EXISTS "lemon_squeezy_subscriptions"(
  "id" integer primary key autoincrement not null,
  "billable_id" integer not null,
  "billable_type" varchar not null,
  "type" varchar not null,
  "lemon_squeezy_id" varchar not null,
  "status" varchar not null,
  "product_id" varchar not null,
  "variant_id" varchar not null,
  "card_brand" varchar,
  "card_last_four" varchar,
  "pause_mode" varchar,
  "pause_resumes_at" datetime,
  "trial_ends_at" datetime,
  "renews_at" datetime,
  "ends_at" datetime,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE INDEX "lemon_squeezy_subscriptions_billable_id_billable_type_index" on "lemon_squeezy_subscriptions"(
  "billable_id",
  "billable_type"
);
CREATE UNIQUE INDEX "lemon_squeezy_subscriptions_lemon_squeezy_id_unique" on "lemon_squeezy_subscriptions"(
  "lemon_squeezy_id"
);
CREATE TABLE IF NOT EXISTS "lemon_squeezy_orders"(
  "id" integer primary key autoincrement not null,
  "billable_id" integer not null,
  "billable_type" varchar not null,
  "lemon_squeezy_id" varchar not null,
  "customer_id" varchar not null,
  "identifier" varchar not null,
  "product_id" varchar not null,
  "variant_id" varchar not null,
  "order_number" integer not null,
  "currency" varchar not null,
  "subtotal" integer not null,
  "discount_total" integer not null,
  "tax" integer not null,
  "total" integer not null,
  "tax_name" varchar,
  "status" varchar not null,
  "receipt_url" varchar,
  "refunded" tinyint(1) not null,
  "refunded_at" datetime,
  "ordered_at" datetime not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE INDEX "lemon_squeezy_orders_billable_id_billable_type_index" on "lemon_squeezy_orders"(
  "billable_id",
  "billable_type"
);
CREATE UNIQUE INDEX "lemon_squeezy_orders_lemon_squeezy_id_unique" on "lemon_squeezy_orders"(
  "lemon_squeezy_id"
);
CREATE UNIQUE INDEX "lemon_squeezy_orders_identifier_unique" on "lemon_squeezy_orders"(
  "identifier"
);
CREATE INDEX "lemon_squeezy_orders_product_id_index" on "lemon_squeezy_orders"(
  "product_id"
);
CREATE INDEX "lemon_squeezy_orders_variant_id_index" on "lemon_squeezy_orders"(
  "variant_id"
);
CREATE UNIQUE INDEX "lemon_squeezy_orders_order_number_unique" on "lemon_squeezy_orders"(
  "order_number"
);
CREATE TABLE IF NOT EXISTS "articles"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "title" varchar not null,
  "slug" varchar not null,
  "content" text not null,
  "thumbnail" varchar not null,
  "seo_title" varchar,
  "seo_description" varchar,
  "seo_keywords" varchar,
  "active" tinyint(1) not null default '1',
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("user_id") references "users"("id")
);
CREATE TABLE IF NOT EXISTS "social_accounts"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "account_id" varchar not null,
  "provider" varchar not null,
  "token" text not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("user_id") references "users"("id")
);
CREATE TABLE IF NOT EXISTS "personal_access_tokens"(
  "id" integer primary key autoincrement not null,
  "tokenable_type" varchar not null,
  "tokenable_id" integer not null,
  "name" varchar not null,
  "token" varchar not null,
  "abilities" text,
  "last_used_at" datetime,
  "expires_at" datetime,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" on "personal_access_tokens"(
  "tokenable_type",
  "tokenable_id"
);
CREATE UNIQUE INDEX "personal_access_tokens_token_unique" on "personal_access_tokens"(
  "token"
);
CREATE TABLE IF NOT EXISTS "subscription_items"(
  "id" integer primary key autoincrement not null,
  "subscription_id" integer not null,
  "stripe_id" varchar not null,
  "stripe_product" varchar not null,
  "stripe_price" varchar not null,
  "quantity" integer,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE INDEX "subscription_items_subscription_id_stripe_price_index" on "subscription_items"(
  "subscription_id",
  "stripe_price"
);
CREATE UNIQUE INDEX "subscription_items_stripe_id_unique" on "subscription_items"(
  "stripe_id"
);
CREATE TABLE IF NOT EXISTS "subscriptions"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "type" varchar not null,
  "stripe_id" varchar not null,
  "stripe_status" varchar not null,
  "stripe_price" varchar,
  "quantity" integer,
  "trial_ends_at" datetime,
  "ends_at" datetime,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE INDEX "subscriptions_user_id_stripe_status_index" on "subscriptions"(
  "user_id",
  "stripe_status"
);
CREATE UNIQUE INDEX "subscriptions_stripe_id_unique" on "subscriptions"(
  "stripe_id"
);
CREATE INDEX "users_stripe_id_index" on "users"("stripe_id");
CREATE TABLE IF NOT EXISTS "coming_soon_emails"(
  "id" integer primary key autoincrement not null,
  "email" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "coming_soon_emails_email_unique" on "coming_soon_emails"(
  "email"
);
CREATE TABLE IF NOT EXISTS "permissions"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "guard_name" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "permissions_name_guard_name_unique" on "permissions"(
  "name",
  "guard_name"
);
CREATE TABLE IF NOT EXISTS "roles"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "guard_name" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "roles_name_guard_name_unique" on "roles"(
  "name",
  "guard_name"
);
CREATE TABLE IF NOT EXISTS "model_has_permissions"(
  "permission_id" integer not null,
  "model_type" varchar not null,
  "model_id" integer not null,
  foreign key("permission_id") references "permissions"("id") on delete cascade,
  primary key("permission_id", "model_id", "model_type")
);
CREATE INDEX "model_has_permissions_model_id_model_type_index" on "model_has_permissions"(
  "model_id",
  "model_type"
);
CREATE TABLE IF NOT EXISTS "model_has_roles"(
  "role_id" integer not null,
  "model_type" varchar not null,
  "model_id" integer not null,
  foreign key("role_id") references "roles"("id") on delete cascade,
  primary key("role_id", "model_id", "model_type")
);
CREATE INDEX "model_has_roles_model_id_model_type_index" on "model_has_roles"(
  "model_id",
  "model_type"
);
CREATE TABLE IF NOT EXISTS "role_has_permissions"(
  "permission_id" integer not null,
  "role_id" integer not null,
  foreign key("permission_id") references "permissions"("id") on delete cascade,
  foreign key("role_id") references "roles"("id") on delete cascade,
  primary key("permission_id", "role_id")
);
CREATE TABLE IF NOT EXISTS "teams"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "name" varchar not null,
  "personal_team" tinyint(1) not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE INDEX "teams_user_id_index" on "teams"("user_id");
CREATE TABLE IF NOT EXISTS "team_user"(
  "id" integer primary key autoincrement not null,
  "team_id" integer not null,
  "user_id" integer not null,
  "role" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "team_user_team_id_user_id_unique" on "team_user"(
  "team_id",
  "user_id"
);
CREATE TABLE IF NOT EXISTS "team_invitations"(
  "id" integer primary key autoincrement not null,
  "team_id" integer not null,
  "email" varchar not null,
  "role" varchar,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("team_id") references "teams"("id") on delete cascade
);
CREATE UNIQUE INDEX "team_invitations_team_id_email_unique" on "team_invitations"(
  "team_id",
  "email"
);
CREATE TABLE IF NOT EXISTS "changelogs"(
  "id" integer primary key autoincrement not null,
  "title" varchar,
  "description" text not null,
  "published_at" datetime not null,
  "tags" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "products"(
  "id" integer primary key autoincrement not null,
  "stripe_id" varchar not null,
  "name" varchar not null,
  "description" text,
  "active" tinyint(1) not null default '1',
  "type" varchar not null,
  "default_price" varchar,
  "metadata" text,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "products_stripe_id_unique" on "products"("stripe_id");
CREATE TABLE IF NOT EXISTS "prices"(
  "id" integer primary key autoincrement not null,
  "stripe_id" varchar not null,
  "product_id" varchar not null,
  "active" tinyint(1) not null default '1',
  "currency" varchar not null,
  "type" varchar not null,
  "billing_scheme" varchar not null,
  "tiers_mode" varchar,
  "metadata" text,
  "interval" varchar,
  "interval_count" integer,
  "trial_period_days" integer,
  "usage_type" varchar,
  "unit_amount" integer,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "prices_stripe_id_unique" on "prices"("stripe_id");
CREATE TABLE IF NOT EXISTS "stripe_orders"(
  "id" integer primary key autoincrement not null,
  "stripe_id" varchar not null,
  "user_id" integer not null,
  "price_id" varchar not null,
  "amount" integer not null,
  "currency" varchar not null,
  "status" varchar not null,
  "payment_status" varchar not null,
  "metadata" text,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("user_id") references "users"("id") on delete cascade
);
CREATE UNIQUE INDEX "stripe_orders_stripe_id_unique" on "stripe_orders"(
  "stripe_id"
);
CREATE TABLE IF NOT EXISTS "infos"(
  "id" integer primary key autoincrement not null,
  "created_at" datetime,
  "updated_at" datetime,
  "name" varchar not null
);
CREATE TABLE IF NOT EXISTS "venue_types"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "display_name" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "venue_types_name_unique" on "venue_types"("name");
CREATE TABLE IF NOT EXISTS "cuisines"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "display_name" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "cuisines_name_unique" on "cuisines"("name");
CREATE TABLE IF NOT EXISTS "cuisine_venue"(
  "id" integer primary key autoincrement not null,
  "venue_id" integer not null,
  "cuisine_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("venue_id") references "venues"("id") on delete cascade,
  foreign key("cuisine_id") references "cuisines"("id") on delete cascade
);
CREATE UNIQUE INDEX "cuisine_venue_venue_id_cuisine_id_unique" on "cuisine_venue"(
  "venue_id",
  "cuisine_id"
);
CREATE TABLE IF NOT EXISTS "diet_categories"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "display_name" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "diet_categories_name_unique" on "diet_categories"("name");
CREATE TABLE IF NOT EXISTS "diet_category_venue"(
  "id" integer primary key autoincrement not null,
  "venue_id" integer not null,
  "diet_category_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("venue_id") references "venues"("id") on delete cascade,
  foreign key("diet_category_id") references "diet_categories"("id") on delete cascade
);
CREATE UNIQUE INDEX "diet_category_venue_venue_id_diet_category_id_unique" on "diet_category_venue"(
  "venue_id",
  "diet_category_id"
);
CREATE TABLE IF NOT EXISTS "halal_assurances"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "display_name" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "halal_assurances_name_unique" on "halal_assurances"(
  "name"
);
CREATE TABLE IF NOT EXISTS "price_ranges"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "symbol" varchar,
  "min_price" integer,
  "max_price" integer,
  "display_name" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "price_ranges_name_unique" on "price_ranges"("name");
CREATE TABLE IF NOT EXISTS "areas"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "display_name" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "areas_name_unique" on "areas"("name");
CREATE TABLE IF NOT EXISTS "info"(
  "id" integer primary key autoincrement not null,
  "created_at" datetime,
  "updated_at" datetime,
  "name" varchar not null
);
CREATE TABLE IF NOT EXISTS "venues"(
  "id" integer primary key autoincrement not null,
  "created_at" datetime,
  "updated_at" datetime,
  "name" varchar not null,
  "city" varchar not null,
  "address" varchar not null,
  "lat" numeric not null,
  "lng" numeric not null,
  "google_maps_url" varchar,
  "images" text,
  "remarks" text,
  "email" varchar,
  "website" varchar,
  "telephone" varchar,
  "description" text,
  "opening_hours" text,
  "thumbnail_url" varchar,
  "halal_assurance_expiry_date" date,
  "area_id" integer,
  "price_range_id" integer,
  "venue_type_id" integer,
  "halal_assurance_id" integer,
  foreign key("halal_assurance_id") references halal_assurances("id") on delete set null on update no action,
  foreign key("venue_type_id") references venue_types("id") on delete set null on update no action,
  foreign key("price_range_id") references price_ranges("id") on delete set null on update no action,
  foreign key("area_id") references areas("id") on delete set null on update no action
);

INSERT INTO migrations VALUES(1,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES(2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES(3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO migrations VALUES(4,'2023_01_16_000001_create_customers_table',1);
INSERT INTO migrations VALUES(5,'2023_01_16_000002_create_subscriptions_table',1);
INSERT INTO migrations VALUES(6,'2023_01_16_000003_create_orders_table',1);
INSERT INTO migrations VALUES(7,'2024_02_16_123314_create_articles_table',1);
INSERT INTO migrations VALUES(8,'2024_03_15_123527_create_social_accounts_table',1);
INSERT INTO migrations VALUES(9,'2024_03_16_125637_add_two_factor_columns_to_users_table',1);
INSERT INTO migrations VALUES(10,'2024_03_16_125655_create_personal_access_tokens_table',1);
INSERT INTO migrations VALUES(11,'2024_03_19_070438_create_subscription_items_table',1);
INSERT INTO migrations VALUES(12,'2024_03_19_070439_create_subscriptions_table',1);
INSERT INTO migrations VALUES(13,'2024_03_19_070440_create_customer_columns',1);
INSERT INTO migrations VALUES(14,'2024_04_23_152408_create_coming_soon_emails_table',1);
INSERT INTO migrations VALUES(15,'2024_06_18_150615_create_permission_tables',1);
INSERT INTO migrations VALUES(16,'2024_06_18_163435_create_teams_table',1);
INSERT INTO migrations VALUES(17,'2024_06_18_163436_create_team_user_table',1);
INSERT INTO migrations VALUES(18,'2024_06_18_163437_create_team_invitations_table',1);
INSERT INTO migrations VALUES(19,'2024_08_15_143402_create_changelogs_table',1);
INSERT INTO migrations VALUES(20,'2024_09_11_130421_create_products_table',1);
INSERT INTO migrations VALUES(21,'2024_09_11_131324_create_prices_table',1);
INSERT INTO migrations VALUES(22,'2024_09_15_053647_create_stripe_orders_table',1);
INSERT INTO migrations VALUES(40,'2024_11_01_082844_create_venues_table',2);
INSERT INTO migrations VALUES(41,'2024_11_04_095412_create_info_table',2);
INSERT INTO migrations VALUES(42,'2024_11_21_161603_update_venues_table',3);
